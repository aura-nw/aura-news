<?php
/**
 * Template Name: Aura news category
 * Template Post Type: page
 */
get_header();
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
    );
}
// function action get all post
$thePostArr = query_posts($args);
?>
    <section class="news-category">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="h2 h4-mob mb-0">
                        <?php
                        if (!isset($_GET['category'])) {
                            echo 'Announcement';
                        } else {
                            echo get_category_by_slug( $_GET['category'])->name;
                        }
                        ?>
                    </h1>
                </div>
            </div>
            <div class="row news-card__list">
                <?php
                // loop all post (news) -> print post
                if (have_posts()) :
                    while ( have_posts() ) : the_post();
                        $post_title = get_the_title();
                        $post_link = get_the_permalink();
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 news-card__item">
                            <div class="news-card post-content">
                                <div class="post-item mb-2 mb-lg-5 pb-4">
                                    <div class="post-img-contain">
                                        <a href="<?php echo $post_link ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $post_title ?>" class="post-img">
                                        </a>
                                    </div>
                                    <div class="post-info-contain">
                                        <div class="heading d-flex align-items-center mt-4">
                                            <div class="author-avatar ms-0">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                            </div>
                                            <div class="author-name body fw-bold"><?php echo get_the_author() ?></div>
                                        </div>
                                        <a href="<?php echo $post_link ?>" class="sub-text mt-4 fw-bold post-title"><?php echo $post_title ?></a>
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
                                        <div><a href="<?php echo $post_link ?>" class="body text--green">See more</a></div>
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
<?php
wp_reset_postdata();
get_footer();
?>
