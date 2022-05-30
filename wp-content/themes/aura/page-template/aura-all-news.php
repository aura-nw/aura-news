<?php
/**
 * Template Name: Aura news (All Post)
 * Template Post Type: page
 */
get_header();
global $wp;
?>
<section class="news">
    <?php
    $args = null;
    $args = array(
        'posts_per_page' => 4,
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'suppress_filters' => false,
    );
    // function action get all post
    $thePostArr = query_posts($args);
    // loop all post (news) -> print post
    if (have_posts()) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="newest-carousel">
                    <div id="newest-carousel-slider-for">
                        <?php
                        while ( have_posts() ) : the_post();
                            $post_title = get_the_title();
                            $post_link = get_the_permalink();
                        ?>
                        <div class="carousel__main-item">
                            <a href="<?php echo $post_link ?>" class="newest-carousel__main-img">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_title ?>">
                            </a>
                            <div class="newest-carousel__main-content">
                                <a href="<?php echo $post_link ?>" class="title title-small-mob text--white the-title"><?php echo $post_title ?></a>
                                <div class="flex-wrap the-cats align-items-center">
                                    <?php
                                    // Get all category that post belong to that
                                    $cats =  get_the_terms(get_the_ID(), 'category');
                                    foreach ($cats as $cat) {
                                        ?>
                                        <!-- Print category -->
                                        <a href="/<?php echo $cat->slug ?>" class="aura-tag mt-3 mt-sm-0"><?php echo $cat->name; ?></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="mt-3 mt-sm-0 body-small the-date"><?php echo get_the_date() ?></div>
                                </div>
                                <div class="body the-excerpt"><?php echo get_the_excerpt() ?></div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                    <div id="newest-carousel-slider-nav">
                        <?php
                        while ( have_posts() ) : the_post();
                            $post_title = get_the_title();
                        ?>
                        <div class="carousel__sub-item">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_title ?>"
                                 class="newest-carousel__sub-img">
                            <div class="carousel__sub-item-content">
                                <div class="title-small the-title"><?php echo $post_title ?></div>
                                <div class="d-flex flex-wrap align-items-center">
                                    <?php
                                    // Get all category that post belong to that
                                    $cats =  get_the_terms(get_the_ID(), 'category');
                                    foreach ($cats as $cat) {
                                        ?>
                                        <!-- Print category -->
                                        <a href="/<?php echo $cat->slug ?>" class="aura-tag mt-3 mt-sm-0"><?php echo $cat->name; ?></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="mt-3 mt-sm-0 body-small the-date"><?php echo get_the_date() ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    endif;
    ?>
    <div class="container">
        <div class="row post-box news-card__list" id="news-card-list">
            <?php
            $args = null;
            $args = array(
                'posts_per_page' => 6,
                'offset' => 4,
                'post_type' => 'news',
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'suppress_filters' => false,
            );
            // function action get all post
            $thePostArr = query_posts($args);
            // loop all post (news) -> print post
            if (have_posts()) :
                while ( have_posts() ) : the_post();
                    $post_title = get_the_title();
                    $post_link = get_the_permalink();
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 news-card__item">
                        <div class="news-card post-content">
                            <div class="post-item mb-lg-5 pb-lg-4">
                                <div class="post-img-contain">
                                    <a href="<?php echo $post_link ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_title ?>" class="post-img">
                                    </a>
                                </div>
                                <div class="post-info-contain mt-4">
                                    <a href="<?php echo $post_link ?>" class="title-small fw-bold post-title"><?php echo $post_title ?></a>
                                    <div class="item-post-time my-4">
                                        <div class="d-flex flex-wrap">
                                            <?php
                                            // Get all category that post belong to that
                                            $cats =  get_the_terms(get_the_ID(), 'category');
                                            foreach ($cats as $cat) {
                                                ?>
                                                <!-- Print category -->
                                                <a href="/<?php echo $cat->slug ?>" class="aura-tag mt-3 mt-sm-0"><?php echo $cat->name; ?></a>
                                                <?php
                                            }
                                            ?>
                                            <div class="mt-3 mt-sm-0"><?php echo get_the_date() ?></div>
                                        </div>
                                    </div>
                                    <div class="body item-post-txt"><?php echo get_the_excerpt() ?></div>
                                    <div><a href="<?php echo $post_link ?>" class="body text--green">Read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="button button-outline" id="btn-loadmore">Load more news</button>
            </div>
        </div>
    </div>
    <!-- Overlay -->
    <div class="aura-loader">
        <div class="aura-loader--sprint">
            <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <circle class="load one" cx="60" cy="60" r="40" />
                <circle class="load two" cx="60" cy="60" r="40" />
                <circle class="load three" cx="60" cy="60" r="40" />
            </svg>
            <div class="small-text text--light-gray mt-4">Loading</div>
        </div>
    </div>

</section>
<script type="application/javascript">
    $(document).ready(function(){
        let page = 1;
        let offset = 10;
        const btn = $('#btn-loadmore');
        btn.click(function () {
            $.ajax({
                // use the ajax object url
                url: '<?php echo esc_js( admin_url( 'admin-ajax.php', 'relative' ) ); ?>',
                contentType: "application/json; charset=utf-8",
                datatype: "JSON",
                data: {
                    action: "more_post_ajax", // add your action to the data object
                    offset
                },
                beforeSend : function ( xhr ) {
                    btn.prop('disabled', true);
                    btn.text('Loading...'); // change the button text, you can also add a preloader image
                },
                success: function(data) {
                    if(JSON.parse(data).length > 0) {
                        // add the posts to the container and add to your page count
                        page++;
                        offset = (page === 1) ? 10 : (page * 6 +4)
                        const post = JSON.parse(data);
                        post.forEach(function (p){
                            let innerHtml = `
                            <div class="col-12 col-md-6 col-lg-4 news-card__item">
                                <div class="news-card post-content">
                                    <div class="post-item mb-lg-5 pb-lg-4">
                                        <div class="post-img-contain">
                                            <a href="${p.link}">
                                                <img src="${p.imgUrl}" alt="${p.title}" class="post-img">
                                            </a>
                                        </div>
                                        <div class="post-info-contain mt-4">
                                            <a href="${p.link}" class="title-small fw-bold post-title">${p.title}</a>
                                            <div class="item-post-time my-4">
                                                <div class="d-flex flex-wrap">`;
                                                    p.cats.forEach(function (cat){
                                                        innerHtml += `<a href="${cat.slug}" class="aura-tag mt-3 mt-sm-0">${cat.name}</a>`;
                                                    });
                            innerHtml += `
                                                    <div class="mt-3 mt-sm-0">${p.date}</div>
                                                </div>
                                            </div>
                                            <div class="body item-post-txt">${p.excerpt}</div>
                                            <div><a href="${p.link}" class="body text--green">Read more</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                        $('#news-card-list').append(innerHtml);
                        });
                        if(JSON.parse(data).length < 6) btn.remove();
                    } else {
                        btn.remove();
                    }
                },
                error: function(xhr, status, error) {
                    // test to see what you get back on error
                    console.log(error);
                },
                complete: function () {
                    btn.text('Load more news');
                    btn.prop('disabled', false);
                }
            });
        });
        const loading = $('.aura-loader')[0];
        setTimeout(function () {
            loading.classList.add('d-none');
        }, 500);
    });
</script>
<!-- Designer does not support pagination info -> pending pagination -->
<?php
wp_reset_postdata();
get_footer();
?>
