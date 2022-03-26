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
            <div class="banner-info">
                <?php
                // get custom field in Page News (belong to banner)
                $subTitle = get_field( "sub_title" );
                $title = get_field( "title" );
                $desc = get_field( "description" );
                ?>
                <div class="sub-title"><?php echo $subTitle ?></div>
                <div class="title"><?php echo $title ?></div>
                <div class="desc"><?php echo $desc ?></div>
            </div>
            <img src="https://via.placeholder.com/665" alt="Banner Image with fixed height" width="100%" style="height: 665px">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="category-list d-flex">
                        <?php
                        // loop category array -> print all category
                        foreach ($categoryArr as $cat) {
                        ?>
                            <div>
                                <a href="/?category=<?php echo $cat->slug ?>"><?php echo $cat->name; ?></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-2">Search bar</div>
            </div>
            <div class="row">
                <?php
                // loop all post (news) -> print post
                if (have_posts()) :
                    while ( have_posts() ) : the_post();
                        $post_title = get_the_title();
                        $post_link = get_the_permalink();
                        ?>
                        <div class="col-4">
                            <a href="<?php echo $post_link ?>">
                                <div class="card-item">
                                    <?php echo $post_title ?>
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
