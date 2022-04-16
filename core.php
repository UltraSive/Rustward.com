<?php

	/**
	 * core.php
	 * @author     Fabian Tomischka <fabian@fabito.net>
	 * @copyright  2022 Fabito Consulting
	 */

	$config = require __DIR__ . '/config.php';

	require __DIR__ . '/app/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;

	$servers = [];

	/**
	 * Returns the server information for a specific server in the configuration file, queries it information
	 * or returns information from the cache file in case it is offline or still available from cache
	 *
	 * @param array $server
	 * @return array|mixed
	 */
	function getServerDetails(array $server) {

		// Tags from the query protocol do not always match the name displayed
		$tagsMap = [
			'weekly'        => 'Weekly',
			'monthly'       => 'Monthly',
			'biweekly'      => 'Biweekly',
			'vanilla'       => 'Vanilla',
			'pve'           => 'PvE',
			'softcore'      => 'Softcore',
			'roleplay'      => 'Roleplay',
			'minigame'      => 'Minigame',
			'training'      => 'Combat Train',
			'battlefield'   => 'Battlefield',
			'builds'        => 'Build Server',
			'broyale'       => 'Battle Royale',
		];

		$cachePath = 'cache/' . $server['ip'] . '_' . $server['port'] . '.cache';

		// Check if cache for that server is still valid, and if so, skip the query
		if (file_exists($cachePath) && (filemtime($cachePath) > (time() - 60 * 10 ))) {
			return json_decode(file_get_contents($cachePath), true);
		}

		$sourceQuery = new SourceQuery();
		$serverInfo = [];

		try {

			$sourceQuery->Connect($server['ip'], $server['port'], 1, SourceQuery::SOURCE);

			$info = $sourceQuery->GetInfo();
			$additionalInfo = $sourceQuery->GetRules();

			// Query splits the description between multiple entities, adding them back together
			$description = '';

			// Some modded servers seem to have changed the value returned by the servers
			// we need to manually check if they are supplied. Some modded servers
			// also seem to have changed the first description_00 to description_0, which is
			// why we manually add it in case it exists

			if(array_key_exists('description_0', $additionalInfo)) {
				$description .= $additionalInfo['description_0'];
			}

			for($i = 0; $i <= 15; $i++) {

				$descriptionIdKey = 'description_' . sprintf("%02d", $i);

				if(array_key_exists($descriptionIdKey, $additionalInfo)) {
					$description .= $additionalInfo[$descriptionIdKey];
				}
			}

			// Server description use n for new lines, replace it with breakline
			$description = str_replace('\n', '<br>', $description);

			// Using t for tab replacement, use small spacing instead
			$description = str_replace('\t', '&nbsp;&nbsp;', $description);

			// Server tags sorting
			$tagsArray = explode(',', $info['GameTags']);
			$tags = [];

			foreach($tagsArray as $tag) {
				if(array_key_exists($tag, $tagsMap)) {
					$tags[] = $tagsMap[$tag];
				}
			}

			$serverInfo = [
				'ip'                => $server['ip'],
				'port'              => $server['port'],
				'name'              => $info['HostName'],
				'map'               => $info['Map'],
				'players'           => (int) $info['Players'],
				'maxPlayers'        => (int) $info['MaxPlayers'],
				'playersPercentage' => round((int) $info['Players'] / (int) $info['MaxPlayers'] * 100),
				'image'             => str_replace(['https://', 'http://'], '//', $additionalInfo['headerimage']),
				'description'       => $description,
				'store'             => $server['storeLink'],
				'battlemetrics'     => $server['battlemetricsLink'],
				'tags'              => $tags,
				'online'            => true,
			];

			file_put_contents($cachePath, json_encode($serverInfo));

		} catch(Exception $e) {

			// In case server isn't available, mark it as offline and return the info
			$serverCache = json_decode(file_get_contents($cachePath), true);

			$serverCache['online'] = false;

			file_put_contents($cachePath, json_encode($serverCache));

			$serverInfo = $serverCache;

		} finally {
			$sourceQuery->Disconnect();
		}

		return $serverInfo;
	}

	foreach($config['servers'] as $configServer) {
		$servers[] = getServerDetails($configServer);
	}
