<?php
/**
 * Template Name: Aura news
 * Template Post Type: page
 */
get_header();
global $wp;
$args = null;
// get all news category
$argsCats = array(
    'hide_empty' => 0,
    'pad_counts' => true,
    'taxonomy'=> 'category',
    'type' => 'news'
);
$categoryArr = get_categories($argsCats);
// get first category -> default category in the first time
$home_page_cats =  get_option('home_page_cats');
$firstCategory = get_term_by( 'slug', get_option('home_page_cats')[0], 'category' );
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
        <img src="<?php echo get_field('desktop_image'); ?>" alt="Banner desktop" class="d-none d-lg-block">
        <img src="<?php echo get_field('mobile_image'); ?>" alt="Banner Mobile" class="d-lg-none">
        <div class="banner-hero__content">
            <?php if(get_field('title') !== null || strlen(get_field('title')) > 0) echo '<h1 class="text-gradient h3-mob d-block">'.get_field('title').'</h1>' ?>
            <?php if(get_field('sub_title') !== null || strlen(get_field('sub_title')) > 0) echo '<h2 class="title body-small-mob text--light-gray d-block mb-0">'.get_field('sub_title').'</h2>' ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center">
                    <?php
                    // get categories activated
                    foreach ($home_page_cats as $key => $cat) {
                        $category = get_term_by('slug', $cat, 'category');
                        ?>
                        <div class="tab-content">
                            <a href="/?category=<?php echo $category->slug ?>"
                               class="h4 text-decoration-none
                               <?php
                               if(!isset($_GET['category']) && $key == 0) {
                                   echo 'active';
                               } else if ($_GET['category'] == $category->slug) {
                                   echo 'active';
                               }
                               ?>"><?php echo $category->name; ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row post-box news-card__list">
            <?php
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
                                                <span class="aura-tag mt-3 mt-sm-0"><?php echo $cat->name; ?></span>
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
    </div>
</section>
<!-- Designer does not support pagination info -> pending pagination -->
<?php
wp_reset_postdata();
get_footer();
?>
