<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title('');?></title>
    <!-- meta name allow design css when screen change -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link type="image/x-icon" rel="shortcut icon" href="<?php echo IMAGE_URL; ?>/favicon.png">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
                        <input class="search-bar" type="text" name="s" placeholder="Search..." maxlength="200"
                               autocomplete="off" onkeyup="handleInput(this.value)"/>
                        <input type="hidden" name="post_type" value="news" />
                        <button type="reset" class="btn-reset" onclick="handleInput('')"></button>
                        <button type="submit" class="btn-submit"></button>
                    </form>
                    <div class="style_wrapper style_start d-none" id="mob-style-wrapper">
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
                                <div class="mt-3 d-none" id="search-history-contain-mob">
                                    <div class="d-flex align-items-center text--white body-small fw-normal">
                                        <i class="icon aura-icon aura-icon-white-clock me-3"></i>
                                        <span>History search</span>
                                    </div>
                                    <div class="d-flex flex-wrap mt-4" id="search-history-mob"></div>
                                </div>
                            </div>
                            <div class="tab-search">
                                <div class="tab-content">
                                    <div class="d-flex align-items-center text--white body-small fw-normal overflow-hidden">
                                        <i class="icon aura-icon aura-icon-white-search me-3"></i>
                                        <span>Search &nbsp;</span> "<span id="mob-search-key"></span>"
                                    </div>
                                    <div class="d-flex flex-wrap mt-4" id="searchKeyMob"></div>
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
                        <a class="nav-link ps-0" href="/">HOME</a>
                    </li>

                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 mb-lg-0 mr-md-8 dropdown">
                        <a class="nav-link ps-0" href="/breaking-news">NEWS</a>
                    </li>

                    <?php
                        echo header_custom_main_menu();
                    ?>

                    <li class="nav-item mx-lg-4 mx-xl-5 h4 h3-mob mb-5 mb-lg-0 mr-md-8 dropdown">
                        <a class="nav-link ps-0" href="/faqs">FAQs</a>
                    </li>
                </ul>
            </div>
            <div class="flex-shrink-0 mt-5 mt-lg-0">
                <div class="d-flex">
                    <div class="search-group d-none d-lg-block" id="clickBox">
                        <form class="search-bar-form text-start text-lg-end"
                              method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                            <input class="search-bar" type="text" name="s" placeholder="Search..."  maxlength="200"
                                   autocomplete="off" onkeyup="handleInput(this.value)"/>
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
                                    <div class="mt-3 d-none" id="search-history-contain-des">
                                        <div class="d-flex align-items-center text--white body-small">
                                            <i class="icon aura-icon aura-icon-white-clock me-3"></i>
                                            <span>History search</span>
                                        </div>
                                        <div class="d-flex flex-wrap mt-4" id="search-history-des"></div>
                                    </div>
                                </div>
                                <div class="tab-search">
                                    <div class="tab-content">
                                        <div class="d-flex align-items-center text--white body-small overflow-hidden">
                                            <i class="icon aura-icon aura-icon-white-search me-3"></i>
                                            <span>Search &nbsp;</span>"<span id="des-search-key"></span>"
                                        </div>
                                        <div class="d-flex flex-wrap mt-4" id="searchKeyDes"></div>
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
        // create cookie for search history (if not existed)
        let searchData = getCookie('history_search');
        if(!searchData) {
            const historyObj = [];
            document.cookie = "history_search=" + JSON.stringify(historyObj);
        } else {
            searchData = JSON.parse(searchData);
            // create search history area when have search cookie in memory
            if (searchData.length > 1 || (searchData.length === 1 && searchData[0] !== '')) {
                $('#search-history-contain-mob').removeClass('d-none');
                $('#search-history-contain-des').removeClass('d-none');
                searchData = searchData.slice(-10);
                searchData.forEach(item => {
                    let searchInnerHtml = "<a href='/?s="+ item +"&post_type=news' class='aura-tag'><span>#"+ item +"</span></a>"
                    $('#search-history-contain-mob').append(searchInnerHtml);
                    $('#search-history-contain-des').append(searchInnerHtml);
                })
            } else {
                $('#search-history-contain-mob').addClass('d-none');
                $('#search-history-contain-des').addClass('d-none');
                $('#search-history-contain-mob').innerHTML = ``;
                $('#search-history-contain-des').innerHTML = ``;
            }
        }
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
                setTimeout(function() {
                    $('#mob-style-wrapper').removeClass('d-none');
                    $('#mob-style-wrapper').addClass('d-block');
                }, 200);
            } else {
                $('.style_dropdownWrapper').hide();
                $('#headerMenuNavbar').removeClass('expanded');
                $('#headerMenuToggler').removeClass('d-none');
                $('#mob-style-wrapper').removeClass('d-block');
                $('#mob-style-wrapper').addClass('d-none');
            }
        });

        // show popup when click into search box
        $('#searchform').click(function () {
            $('.style_wrapper').show();
            if ($(window).width() > 992) {
                $('#des-dropdownWrapper').show();
            }
        });
        // hide popup when click out search box
        window.addEventListener('mousedown', function(e){
            if (!document.getElementById('clickBox').contains(e.target)){
                $('.style_wrapper').hide();
            }
        });
        // save search history every search form submit
        $('#searchform').submit(function (event) {
            const searchKeyword = $('#searchform .search-bar').val();
            if(getCookie('history_search') && searchKeyword.trim().length > 0) {
                historyObj = JSON.parse(getCookie('history_search'));
                historyObj.push(searchKeyword);
                document.cookie = "history_search=" + JSON.stringify(historyObj);
            }
        })
        $('#searchFormMob').submit(function (event) {
            const searchKeyword = $('#searchFormMob .search-bar').val();
            if(getCookie('history_search') && searchKeyword.trim().length > 0) {
                historyObj = JSON.parse(getCookie('history_search'));
                historyObj.push(searchKeyword);
                document.cookie = "history_search=" + JSON.stringify(historyObj);
            }
        })
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
        $('#searchKeyMob').empty();
        $('#searchKeyDes').empty();
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

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }


    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 seconds for example
    var $inputMob = $('#searchFormMob .search-bar');
    var $inputDes = $('#searchform .search-bar');

    //on keyup, start the countdown
    $inputMob.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(searchAutoComplete, doneTypingInterval);
    });
    $inputDes.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(searchAutoComplete, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputMob.on('keydown', function () {
        clearTimeout(typingTimer);
    });
    $inputDes.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    function searchAutoComplete() {
        // show trending data by ajax
        let searchKeyWord = $('#searchFormMob .search-bar').val();
        if($(window).width() > 992) {
            searchKeyWord = $('#searchform .search-bar').val();
        }
        // clear tags
        $('#searchKeyMob').empty();
        $('#searchKeyDes').empty();
        $.ajax({
            type: "GET", //Phương thức truyền post hoặc get
            dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
            url : '<?php echo esc_js( admin_url( 'admin-ajax.php', 'relative' ) ); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
            data : {
                action: "my_action", //Tên action
                keywords: searchKeyWord
            },
            success:function(data){
                if(data && data.length > 0) {
                    $('#searchKeyMob').empty();
                    $('#searchKeyDes').empty();
                    data = data.slice(-10);
                    data.forEach(item => {
                        let searchInnerHtml = "<a href='/?s="+ item.key_word +"&post_type=news' class='aura-tag'><span>#"+ item.key_word +"</span></a>"
                        if ($(window).width() > 992) {
                            $('#searchKeyDes').append(searchInnerHtml);
                        } else {
                            $('#searchKeyMob').append(searchInnerHtml);
                        }
                    })
                } else {
                    // No information found in the system
                    $('#searchKeyMob').append(`<div class="body-small">No information found in the system</div>`);
                    $('#searchKeyDes').append(`<div class="body-small">No information found in the system</div>`);
                }
            },
            error: function(errorThrown){
                console.log(errorThrown)
            }
        })
    }
</script>