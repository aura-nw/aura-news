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
<?php
global $wpdb;
$table_name = "tds_search_tag_trending";
$temp = $wpdb->get_results("SELECT key_word, count FROM $table_name ORDER BY count DESC LIMIT 10");
$catSlug = $_GET['category'];
?>
<nav class="navbar navbar-expand-lg py-4 pb-5 pb-lg-4" id="headerMenuNavbar">
    <div class="container-fluid nav-contain px-0">
        <a class="d-lg-none aura-logo" href="/">
            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x.png'?> 2x"
                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?>"
                 alt="Aura Logo">
        </a>
        <div class="d-flex">
            <button class="navbar-toggler ml-auto d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#headerSearchMenu"
                    aria-controls="headerSearchMenu" aria-expanded="false" id="headerSearchToggler">
                <i class="icon search"></i>
            </button>
            <button class="navbar-toggler ml-auto d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#headerMenu"
                    aria-controls="headerMenu" aria-expanded="false" id="headerMenuToggler">
                <i class="icon"></i>
            </button>
        </div>
        <div class="d-block d-lg-none col-12">
            <div class="collapse navbar-collapse" id="headerSearchMenu">
                <div class="search-group">
                    <form class="search-bar-form" method="get" id="searchFormMob" action="<?php bloginfo('home'); ?>/">
                        <input class="search-bar" type="text" name="s" placeholder="Search..." autocomplete="off" onkeyup="handleInput(this.value)"/>
                        <input type="hidden" name="post_type" value="news" />
                        <button type="reset" class="btn-reset" onclick="handleInput('')"></button>
                        <button type="submit" class="btn-submit"></button>
                    </form>
                    <div class="style_wrapper style_start d-block">
                        <div class="style_dropdownWrapper" id="mob-dropdownWrapper">
                            <div class="tab-trending">
                                <div>
                                    <div class="d-flex align-items-center text--white body-small fw-normal">
                                        <i class="icon aura-icon aura-icon-white-line-up me-3"></i>
                                        <span>Trending Search</span>
                                    </div>
                                    <div class="d-flex flex-wrap mt-4">
                                        <?php foreach($temp as $value): ?>
                                            <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                <span>#<?= ucwords($value->key_word) ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex align-items-center text--white body-small fw-normal">
                                        <i class="icon aura-icon aura-icon-white-clock me-3"></i>
                                        <span>History search</span>
                                    </div>
                                    <div class="d-flex flex-wrap mt-4">
                                        <?php foreach($temp as $value): ?>
                                            <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                <span>#<?= ucwords($value->key_word) ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-search">
                                <div class="tab-content">
                                    <div class="d-flex align-items-center text--white body-small fw-normal">
                                        <i class="icon aura-icon aura-icon-white-search me-3"></i>
                                        <span>Search &nbsp;</span> "<span id="mob-search-key"></span>"
                                    </div>
                                    <div class="d-flex flex-wrap mt-4">
                                        <?php foreach($temp as $value): ?>
                                            <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                <span>#<?= ucwords($value->key_word) ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="headerMenu">
            <div class="d-lg-flex justify-content-center justify-content-lg-start w-100">
                <ul class="navbar-nav nav-menu align-items-lg-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand aura-logo" href="/">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </li>
                    <li class="nav-item mx-4 mx-lg-12 d-none d-lg-block">
                        <div class="divider divider-vertical"></div>
                    </li>
                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 mb-lg-0 mr-md-8 dropdown">
                        <a class="nav-link ps-0 <?php if(!isset($catSlug)) echo 'show'; ?>" href="/">HOME</a>
                    </li>
                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 my-lg-0 mr-md-8">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle ps-0" type="button" id="dropdownMenuResources" data-bs-toggle="dropdown">
                                ANNOUNCEMENT
                            </button>
                            <ul class="dropdown-menu body sub-text-mob" aria-labelledby="dropdownMenuResources">
                                <?php
                                // get categories activated
                                $header_menu_cats =  get_option('header_menu_cats');
                                foreach ($header_menu_cats as $cat) {
                                    $category = get_term_by('slug', $cat, 'category');
                                    ?>
                                    <li>
                                        <a href="announcement/?category=<?php echo $category->slug ?>"
                                           class="dropdown-item h4" target="_blank"><?php echo $category->name; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex-shrink-0 mt-5 mt-lg-0">
                <div class="d-flex">
                    <div class="search-group d-none d-sm-block" id="clickBox">
                        <form class="search-bar-form text-start text-lg-end"
                              method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                            <input class="search-bar" type="text" name="s" placeholder="Search..." autocomplete="off" onkeyup="handleInput(this.value)"/>
                            <input type="hidden" name="post_type" value="news" />
                            <button type="reset" class="btn-reset" onclick="handleInput('')"></button>
                            <button type="submit" class="btn-submit"></button>
                        </form>
                        <div class="style_wrapper">
                            <div class="style_dropdownWrapper" id="des-dropdownWrapper">
                                <div class="tab-trending">
                                    <div>
                                        <div class="d-flex align-items-center text--white body-small">
                                            <i class="icon aura-icon aura-icon-white-line-up me-3"></i>
                                            <span>Trending Search</span>
                                        </div>
                                        <div class="d-flex flex-wrap mt-4">
                                            <?php foreach($temp as $value): ?>
                                                <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                    <span>#<?= ucwords($value->key_word) ?></span>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center text--white body-small">
                                            <i class="icon aura-icon aura-icon-white-clock me-3"></i>
                                            <span>History search</span>
                                        </div>
                                        <div class="d-flex flex-wrap mt-4">
                                            <?php foreach($temp as $value): ?>
                                                <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                    <span>#<?= ucwords($value->key_word) ?></span>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-search">
                                    <div class="tab-content">
                                        <div class="d-flex align-items-center text--white body-small">
                                            <i class="icon aura-icon aura-icon-white-search me-3"></i>
                                            <span>Search &nbsp;</span>"<span id="des-search-key"></span>"
                                        </div>
                                        <div class="d-flex flex-wrap mt-4">
                                            <?php foreach($temp as $value): ?>
                                                <a href="/?s=<?= ucwords($value->key_word) ?>&post_type=news" class="aura-tag">
                                                    <span>#<?= ucwords($value->key_word) ?></span>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-group">
                        <!-- 171 -->
                        <?php echo do_shortcode('[elementor-template id="905"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script type="application/javascript">
    $(document).ready(function(){
        // add support class for expanded navbar (full height of window)
        $('#headerMenuToggler').click(function () {
            if($('#headerMenuToggler').attr('aria-expanded') === 'true') {
                $('#headerMenuNavbar').addClass('expanded');
                $('#headerSearchToggler').addClass('d-none');
            } else {
                $('#headerMenuNavbar').removeClass('expanded');
                $('#headerSearchToggler').removeClass('d-none');
            }
        });
        $('#headerSearchToggler').click(function () {
            if($('#headerSearchToggler').attr('aria-expanded') === 'true') {
                $('.style_dropdownWrapper').show();
                $('#headerMenuNavbar').addClass('expanded');
                $('#headerMenuToggler').addClass('d-none');
            } else {
                $('.style_dropdownWrapper').hide();
                $('#headerMenuNavbar').removeClass('expanded');
                $('#headerMenuToggler').removeClass('d-none');
            }
        });
        // show popup when click into search box
        $('#searchform').click(function () {
            $('.style_wrapper').show();
        });
        // hide popup when click out search box
        window.addEventListener('mousedown', function(e){
            if (!document.getElementById('clickBox').contains(e.target)){
                    $('.style_wrapper').hide();
                }
            });
        });

    function handleInput(e) {
        let searchKeyWord = $('#mob-search-key');
        if($(window).width() > 992) {
            searchKeyWord = $('#des-search-key');
        }
        searchKeyWord.text(e);
        // handle event when input change value
        if (e.trim().length === 0) {
            hideSearchTerm();
        } else {
            showSearchTerm();
        }
    }

    function showSearchTerm() {
        let searchBox = $('#mob-dropdownWrapper .tab-search');
        let trendingBox = $('#mob-dropdownWrapper .tab-trending');
        if($(window).width() > 992) {
            searchBox = $('#des-dropdownWrapper .tab-search');
            trendingBox = $('#des-dropdownWrapper .tab-trending');
        }
        searchBox.addClass('show');
        trendingBox.addClass('hide');
    }

    function hideSearchTerm() {
        let searchBox = $('#mob-dropdownWrapper .tab-search');
        let trendingBox = $('#mob-dropdownWrapper .tab-trending');
        if($(window).width() > 992) {
            searchBox = $('#des-dropdownWrapper .tab-search');
            trendingBox = $('#des-dropdownWrapper .tab-trending');
        }
        searchBox.removeClass('show');
        trendingBox.removeClass('hide');
    }

</script>