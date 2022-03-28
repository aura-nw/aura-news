<?php
/**
 * Template Name: Aura news
 * Template Post Type: page
 */
get_header();
global $wp;
$args = null;
// get all news category
$categoryArr = get_categories('taxonomy=category&type=news');
// get first category -> default category in the first time
$firstCategory = get_categories('taxonomy=category&type=news')[0];
// if have category in URL -> get all news belong to that category
if (isset($_GET['category'])) {
    $args = array(
            'post_type' => 'news',
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'suppress_filters' => false,
            'tax_query' => array(
                    array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $_GET['category']
                    )
            )
    );
} else {
    $args = array(
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $firstCategory->slug
            )
        )
    );
}
// function action get all post
$thePostArr = query_posts($args);
?>
<section class="news">
    <div class="banner-hero">
        <div class="container banner-info">
            <div class="row">
                <div class="col-12">
                    <?php
                    // get custom field in Page News (belong to banner)
                    $subTitle = get_field( "sub_title" );
                    $title = get_field( "title" );
                    $desc = get_field( "description" );
                    ?>
                    <div class="sub-title d-flex align-items-center">
                        <span><?php echo $subTitle ?></span>
                        <img src="<?php echo IMAGE_URL.'/icons/color/check-decagram.png' ?>" alt="" class="ms-3">
                    </div>
                    <h2 class=""><?php echo $title ?></h2>
                    <div class="body text--light-gray fw-bold"><?php echo $desc ?></div>
                </div>
            </div>
        </div>
        <img src="<?php echo $thumbnail = get_the_post_thumbnail_url(); ?>" alt="<?php echo $thumbnail = get_the_post_thumbnail_url(); ?>" class="d-none d-lg-block">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="category-list d-flex">
                    <?php
                    // loop category array -> print all category
                    foreach ($categoryArr as $key=>$cat   ) {
                        ?>
                        <div class="tab-content">
                            <a href="/news/?category=<?php echo $cat->slug ?>"
                               class="h4 text-decoration-none
                               <?php
                               if(!isset($_GET['category']) && $key == 0) {
                                   echo 'active';
                               } else if (isset($_GET['category']) && $_GET['category'] == $cat->slug) {
                                   echo 'active';
                               }
                               ?>"><?php echo $cat->name; ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <form class="search-bar-form text-start text-lg-end"
                      method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                    <input id="search-bar" type="text" name="s" placeholder="Search..." />
                    <input type="hidden" name="post_type" value="news" />
                    <button type="submit" </button>
                </form>
            </div>
        </div>
        <div class="row post-box">
            <?php
            // loop all post (news) -> print post
            if (have_posts()) :
                while ( have_posts() ) : the_post();
                    $post_title = get_the_title();
                    $post_link = get_the_permalink();
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?php echo $post_link ?>" class="post-content">
                            <div class="post-item mb-5 pb-4">
                                <div class="post-img-contain">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_title ?>" class="post-img">
                                </div>
                                <div class="heading d-flex align-items-center mt-4">
                                    <div class="author-avatar ms-0">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                    </div>
                                    <div class="author-name body fw-bold"><?php echo get_the_author() ?></div>
                                </div>
                                <div class="sub-text mt-4 fw-bold post-title"><?php echo $post_title ?></div>
                                <div class="item-post-time my-sm-2"><?php echo get_the_date() ?></div>
                                <div class="body item-post-txt"><?php echo get_the_excerpt() ?></div>
                            </div>
                        </a>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<!-- Designer does not support pagination info -> pending pagination -->
<?php
wp_reset_postdata();
get_footer();
?>
