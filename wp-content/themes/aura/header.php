<!DOCTYPE html>
<html>
<head>
	<title></title>
    <!-- meta name allow design css when screen change -->
     <meta name="viewport" content="width=device-width,initial-scale=1">
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo IMAGE_URL; ?>/favicon.png">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,vietnamese' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=vietnamese" rel="stylesheet">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg py-4">
    <div class="container-fluid mx-4 mx-lg-10 px-0">
        <a class="d-lg-none" href="#">
            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x.png'?> 2x"
                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?>"
                 alt="Aura Logo">
        </a>
        <button class="navbar-toggler ml-auto d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#headerMenu"
                aria-controls="headerMenu" aria-expanded="false">
            <i class="icon icon-close">X</i>
        </button>
        <div class="collapse navbar-collapse pt-10 pb-6 py-md-0 mt-md-0" id="headerMenu">
            <div class="d-lg-flex justify-content-center justify-content-lg-start w-100">
                <ul class="navbar-nav nav-menu align-items-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand" href="#">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </li>
                    <li class="nav-item mx-4 mx-lg-12 d-none d-lg-block">
                        <div class="divider divider-vertical"></div>
                    </li>
                    <li class="nav-item mx-lg-4 h4 h3-mob mb-12 mb-md-0 mr-md-8 dropdown">
                        <button class="nav-link dropdown-toggle m-auto" type="button" id="dropdownMenuFeatures" data-bs-toggle="dropdown" aria-expanded="false">
                            FEATURES
                        </button>
                        <ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuFeatures">
                            <li><a class="dropdown-item" target="_blank" href="https://safe.aura.network/welcome">Safe</a></li>
                            <li><a class="dropdown-item" target="_blank" href="https://docs.aura.network/">Docs</a></li>
                            <li><a class="dropdown-item" target="_blank" href="https://explorer.aura.network/">Explorer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-lg-4 h4 h3-mob mb-12 my-md-0 mr-md-8">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle m-auto" type="button" id="dropdownMenuPartners" data-bs-toggle="dropdown">
                                PARTNERS
                            </button>
                            <ul class="dropdown-menu body sub-text-mob"  aria-labelledby="dropdownMenuPartners">
                                <li><button class="dropdown-item">Partners</button></li>
                                <li><button class="dropdown-item">Advisors</button></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mx-lg-4 h4 h3-mob mb-12 my-md-0 mr-md-8">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle m-auto" type="button" id="dropdownMenuResources" data-bs-toggle="dropdown">
                                RESOURCES
                            </button>
                            <ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuResources">
                                <li><button type="button" class="dropdown-item">Insights</button></li>
                                <!--                    <li><a class="dropdown-item" target="_blank" href="#">Insights</a></li>-->
                                <li><a class="dropdown-item" target="_blank" href="https://github.com/aura-nw/whitepaper/blob/main/release/Aura_Network___whitepaper.pdf">Whitepaper</a></li>
                                <li><a class="dropdown-item" target="_blank" href="https://docs.aura.network/blog">Research</a></li>
                                <li><button class="dropdown-item">FAQs</button></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mx-lg-4 h4 h3-mob mb-12 my-md-0">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle m-auto" type="button" id="dropdownMenuAbout" data-bs-toggle="dropdown">
                                ABOUT US
                            </button>
                            <ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuAbout">
                                <li><button class="dropdown-item">Meet Our Team</button></li>
                                <li><a class="dropdown-item" target="_blank" href="https://aura-network.notion.site/Aura-Job-Board-172bb39a89d844b0a0e1d8871026dc23">Careers</a></li>
                                <li><a class="dropdown-item" target="_blank" href="https://discord.com/login?redirect_to=%2Fchannels%2F925227249408557086%2F925227249408557089">Contact us</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <?php echo do_shortcode('[elementor-template id="171"]'); ?>
            </div>
        </div>
    </div>
</nav>