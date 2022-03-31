<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title('');?></title>
    <!-- meta name allow design css when screen change -->
     <meta name="viewport" content="width=device-width,initial-scale=1">
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo IMAGE_URL; ?>/favicon.png">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,vietnamese' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=vietnamese" rel="stylesheet">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg py-4 pb-5 pb-lg-4" id="headerMenuNavbar">
    <div class="container-fluid">
        <a class="d-lg-none" href="/">
            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x-v2.png'?> 2x"
                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?>"
                 alt="Aura Logo">
        </a>
        <button class="navbar-toggler ml-auto d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#headerMenu"
                aria-controls="headerMenu" aria-expanded="false" id="headerMenuToggler">
            <i class="icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="headerMenu">
            <div class="d-lg-flex justify-content-center justify-content-lg-start w-100">
                <ul class="navbar-nav nav-menu align-items-lg-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand" href="/">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x-v2.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </li>
                    <li class="nav-item mx-4 mx-lg-12 d-none d-lg-block">
                        <div class="divider divider-vertical"></div>
                    </li>
                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 mb-lg-0 mr-md-8 dropdown">
                        <a class="nav-link ps-0" href="/">HOME</a>
                    </li>
                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 my-lg-0 mr-md-8">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle ps-0" type="button" id="dropdownMenuResources" data-bs-toggle="dropdown">
                                ANNOUNCEMENT
                            </button>
                            <ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuResources">
                                <li><button class="dropdown-item sub-text-redig">PARTNERSHIP</button></li>
                                <li><button class="dropdown-item sub-text-redig">NEWS</button></li>
                                <li><a class="dropdown-item sub-text-redig" target="_blank" href="https://aura-network.notion.site/Aura-Job-Board-172bb39a89d844b0a0e1d8871026dc23">CAREERS</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex-shrink-0 mt-5 mt-lg-0 social-group">
                <!-- 171 -->
                <?php echo do_shortcode('[elementor-template id="171"]'); ?>
            </div>
        </div>
    </div>
</nav>
<script type="application/javascript">
    $(document).ready(function(){
        $('#headerMenuToggler').click(function () {
            if($('#headerMenuToggler').attr('aria-expanded') == 'true') {
                $('#headerMenuNavbar').addClass('expanded');
            } else {
                $('#headerMenuNavbar').removeClass('expanded');
            }
        })
    });
</script>