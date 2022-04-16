<?php
    require_once __DIR__ . '/core.php';
?>
<!doctype html>
<html lang="<?php echo $config['language']; ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $config['title']; ?></title>
    <meta name="description" content="<?php echo $config['description']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?php echo $config['title']; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico">

    <meta name="theme-color" content="#141814CC">
</head>

<body style="background: url(img/<?php echo $config['backgroundImage']; ?>) no-repeat center top rgb(20, 24, 20)">
    <div class="background-gradient"></div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded navbar-rust" aria-label="Navigation">
            <div class="container-fluid">
                <a class="navbar-brand navbar-logo-container" href="#home" title="Home">
                    <img class="nav-logo" src="img/<?php echo $config['logo']; ?>" alt="Logo of <?php echo $config['title']; ?>" title="Home">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servers">Servers</a>
                        </li>
                        <?php if($config['store']['enabled'] == 'yes') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#store"><?php echo $config['store']['navigation']; ?></a>
                            </li>
                        <?php } ?>
	                    <?php if($config['rules']['enabled'] == 'yes') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#rules"><?php echo $config['rules']['navigation']; ?></a>
                            </li>
	                    <?php } ?>
                        <?php if($config['staff']['enabled'] == 'yes') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#staff"><?php echo $config['staff']['navigation']; ?></a>
                            </li>
                        <?php } ?>
	                    <?php if($config['faq']['enabled'] == 'yes') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#faq"><?php echo $config['faq']['navigation']; ?></a>
                            </li>
	                    <?php } ?>
                        <?php
                            if($config['navigation']['enabled'] == 'yes') {
                                foreach($config['navigation']['links'] as $link) {
                                    echo '<li class="nav-item"><a class="nav-link" href="' . $link['link'] . '" target="_blank">' . $link['text'] . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
	                <?php if($config['socials']['enabled'] == 'yes') { ?>
                        <div class="socials">
                            <?php if($config['socials']['links']['steam'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['steam']; ?>" target="_blank" title="Steam">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                        <path fill="currentColor" d="M496 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5v1.2L176.6 279c-15.5-.9-30.7 3.4-43.5 12.1L0 236.1C10.2 108.4 117.1 8 247.6 8 384.8 8 496 119 496 256zM155.7 384.3l-30.5-12.6a52.79 52.79 0 0 0 27.2 25.8c26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3.1-40.3-5.4-13-15.5-23.2-28.5-28.6-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zm173.8-129.9c-34.4 0-62.4-28-62.4-62.3s28-62.3 62.4-62.3 62.4 28 62.4 62.3-27.9 62.3-62.4 62.3zm.1-15.6c25.9 0 46.9-21 46.9-46.8 0-25.9-21-46.8-46.9-46.8s-46.9 21-46.9 46.8c.1 25.8 21.1 46.8 46.9 46.8z"/>
                                    </svg>
                                </a>
                            <?php } ?>
	                        <?php if($config['socials']['links']['youtube'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['youtube']; ?>" target="_blank" title="YouTube">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
	                        <?php if($config['socials']['links']['twitch'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['twitch']; ?>" target="_blank" title="Twitch">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M391.17,103.47H352.54v109.7h38.63ZM285,103H246.37V212.75H285ZM120.83,0,24.31,91.42V420.58H140.14V512l96.53-91.42h77.25L487.69,256V0ZM449.07,237.75l-77.22,73.12H294.61l-67.6,64v-64H140.14V36.58H449.07Z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
	                        <?php if($config['socials']['links']['twitter'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['twitter']; ?>" target="_blank" title="Twitter">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                         <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
	                        <?php if($config['socials']['links']['instagram'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['instagram']; ?>" target="_blank" title="Instagram">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                         <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
	                        <?php if($config['socials']['links']['facebook'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['facebook']; ?>" target="_blank" title="Facebook">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
	                        <?php if($config['socials']['links']['vk'] != '') { ?>
                                <a href="<?php echo $config['socials']['links']['vk']; ?>" target="_blank" title="Vk">
                                    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M31.4907 63.4907C0 94.9813 0 145.671 0 247.04V264.96C0 366.329 0 417.019 31.4907 448.509C62.9813 480 113.671 480 215.04 480H232.96C334.329 480 385.019 480 416.509 448.509C448 417.019 448 366.329 448 264.96V247.04C448 145.671 448 94.9813 416.509 63.4907C385.019 32 334.329 32 232.96 32H215.04C113.671 32 62.9813 32 31.4907 63.4907ZM75.6 168.267H126.747C128.427 253.76 166.133 289.973 196 297.44V168.267H244.16V242C273.653 238.827 304.64 205.227 315.093 168.267H363.253C359.313 187.435 351.46 205.583 340.186 221.579C328.913 237.574 314.461 251.071 297.733 261.227C316.41 270.499 332.907 283.63 346.132 299.751C359.357 315.873 369.01 334.618 374.453 354.747H321.44C316.555 337.262 306.614 321.61 292.865 309.754C279.117 297.899 262.173 290.368 244.16 288.107V354.747H238.373C136.267 354.747 78.0267 284.747 75.6 168.267Z"/>
                                    </svg>
                                </a>
	                        <?php } ?>
                        </div>
                     <?php } ?>
                    <?php if($config['discord']['inviteLink'] != '') { ?>
                    <a href="<?php echo $config['discord']['inviteLink']; ?>" target="_blank" title="Join Discord" class="btn btn-discord">
                        <svg class="discord-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="currentColor" d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"/>
                        </svg>
	                    <?php echo $config['discord']['text']; ?>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </nav>

        <main>

            <section id="home" class="hero">
                <h1 class="animate__animated animate__fadeIn"><?php echo $config['welcome']; ?> <span class="server-brand"><?php echo $config['title']; ?></span></h1>
                <p class="animate__animated animate__fadeIn"><?php echo $config['description']; ?></p>
            </section>

            <section id="servers" class="servers">
                <div class="row justify-content-center">
                    <?php foreach($servers as $serverId => $server) { ?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="server animate__animated animate__fadeIn">
                                <div class="server-image-container">
                                    <img class="server-image img-fluid" src="<?php echo $server['image']; ?>" alt="<?php echo $server['name']; ?> Server Image" title="<?php echo $server['name']; ?>">
                                    <div class="server-image-overlay"></div>
                                </div>
                                <div class="server-container">
                                    <span class="server-name"><?php echo $server['name']; ?></span>
                                    <span class="server-description"><?php echo $server['map']; ?></span>
                                    <div class="server-tags">
                                        <?php foreach($server['tags'] as $tag) { ?>
                                            <span class="server-tag"><?php echo $tag; ?></span>
                                        <?php } ?>
                                    </div>
                                    <?php if($server['online'] === true) { ?>
                                        <span class="server-players"><?php echo $server['players']; ?> / <?php echo $server['maxPlayers']; ?> players</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-rust" role="progressbar" aria-label="Amount of players" aria-valuemin="<?php echo $server['playersPercentage']; ?>" aria-valuemax="<?php echo $server['maxPlayers']; ?>" style="width: <?php echo $server['playersPercentage']; ?>%"></div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="server-message">
                                            <div class="server-offline">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                Server is currently offline
                                            </div>
                                        </div>
                                    <?php } ?>
	                                <?php if($server['online'] === true) { ?>
                                        <a href="steam://connect/<?php echo $server['ip'] . ':' . $server['port']; ?>" title="Connect via Steam" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            Connect
                                        </a>
                                    <?php } ?>
	                                <?php if($server['store'] != '') { ?>
                                        <a href="<?php echo $server['store']; ?>" target="_blank" title="Shop" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Shop
                                        </a>
	                                <?php } ?>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#server<?php echo $serverId; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Info
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <?php if($config['store']['enabled'] == 'yes') { ?>
                <section id="store" class="store">
                    <div class="row">
                        <div class="d-none d-md-flex col-12 col-md-6">
                            <div class="store-image-container">
                                <img class="img-fluid" src="img/vending.webp" alt="A vending machine in Rust" title="Shop">
                                <div class="store-image-overlay"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h2 class="store-heading text-center text-md-start"><?php echo $config['store']['heading']; ?></h2>
                            <div class="store-message"><?php echo $config['store']['message']; ?></div>
                            <a href="<?php echo $config['store']['link']; ?>" title="Shop" target="_blank" class="d-block d-md-inline-block btn btn-primary btn-store">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
	                            <?php echo $config['store']['button']; ?>
                            </a>
                        </div>
                    </div>
                </section>
            <?php } ?>

	        <?php if($config['rules']['enabled'] == 'yes') { ?>
                <section id="rules" class="rules">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="rules-heading"><?php echo $config['rules']['heading']; ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionRules">
	                            <?php foreach($config['rules']['rules'] as $ruleId => $rule) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="rule<?php echo $ruleId; ?>">
                                            <button class="accordion-button <?php if($ruleId > 0) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRule<?php echo $ruleId; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <?php echo $rule['title']; ?>
                                            </button>
                                        </h2>
                                        <div id="collapseRule<?php echo $ruleId; ?>" class="accordion-collapse collapse <?php if($ruleId == 0) { echo 'show'; } ?>" data-bs-parent="#accordionRules">
                                            <div class="accordion-body"><?php echo $rule['text']; ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
	        <?php } ?>

	        <?php if($config['staff']['enabled'] == 'yes') { ?>
                <section id="staff" class="staff">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="staff-heading"><?php echo $config['staff']['heading']; ?></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach($config['staff']['members'] as $member) { ?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="member-container d-flex justify-content-center">
                                    <div class="member d-flex flex-column">
                                        <img loading="lazy" src="<?php if($member['avatar'] != '') { echo 'img/' . $member['avatar']; } else { echo 'img/member-default.webp'; } ?>" alt="Avatar of <?php echo $member['name']; ?>" title="<?php echo $member['name']; ?>">
                                        <div class="member-description">
                                            <span class="member-name"><?php echo $member['name']; ?></span>
                                            <span class="member-rank"><?php echo $member['rank']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            <?php } ?>

	        <?php if($config['faq']['enabled'] == 'yes') { ?>
                <section id="faq" class="faq">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="faq-heading"><?php echo $config['faq']['heading']; ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionFaq">
						        <?php foreach($config['faq']['entries'] as $faqId => $faq) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faq<?php echo $faqId; ?>">
                                            <button class="accordion-button <?php if($faqId > 0) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq<?php echo $faqId; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
										        <?php echo $faq['title']; ?>
                                            </button>
                                        </h2>
                                        <div id="collapseFaq<?php echo $faqId; ?>" class="accordion-collapse collapse <?php if($faqId == 0) { echo 'show'; } ?>" data-bs-parent="#accordionFaq">
                                            <div class="accordion-body"><?php echo $faq['text']; ?></div>
                                        </div>
                                    </div>
						        <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
	        <?php } ?>

        </main>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="img/<?php echo $config['logo']; ?>" alt="Logo of <?php echo $config['title']; ?>" title="<?php echo $config['title']; ?> Logo">
                    <div>
                        <span class="copyright">© Copyright <?php echo $config['title']; ?>. All Rights Reserved.</span><br>
                        <small><?php echo $config['title']; ?> is not affiliated with, nor endorsed by Facepunch Studios Ltd. All trademarks and images belong to their respective owners.</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php foreach($servers as $serverId => $server) { ?>
    <div class="modal fade modal-rust" id="server<?php echo $serverId; ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="server-image-modal-container">
                        <img class="server-image-modal img-fluid" src="<?php echo $server['image']; ?>" alt="<?php echo $server['name']; ?> Server Image" title="<?php echo $server['name']; ?>">
                        <div class="server-image-modal-overlay"></div>
                    </div>
                    <div class="server-modal-details">
                        <span class="server-name"><?php echo $server['name']; ?></span>
                        <span class="server-description">
                            <?php echo $server['map']; ?>
	                        <?php if($server['online'] === true) { ?>
                                - <?php echo $server['players']; ?>/<?php echo $server['maxPlayers']; ?>
                            <?php } ?>
                        </span>
                        <span class="server-rules"><?php echo $server['description']; ?></span>
                    </div>
                </div>
                <div class="modal-footer">
	                <?php if($server['battlemetrics'] != '') { ?>
                    <a href="<?php echo $server['battlemetrics']; ?>" target="_blank" title="BattleMetrics" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        BattleMetrics
                    </a>
	                <?php } ?>
                    <?php if($server['store'] != '') { ?>
                    <a href="<?php echo $server['store']; ?>" target="_blank" title="Shop" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Shop
                    </a>
                    <?php } ?>
	                <?php if($server['online'] === true) { ?>
                        <a href="steam://connect/<?php echo $server['ip'] . ':' . $server['port']; ?>" title="Connect via Steam" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Connect
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
