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
            <div class="col-md-9 col-sm-12">
                <div class="category-list d-flex">
                    <?php
                    // loop category array -> print all category
                    foreach ($categoryArr as $cat) {
                        ?>
                        <div class="tab-content">
                            <a href="/?category=<?php echo $cat->slug ?>" class="h4 text-decoration-none active"><?php echo $cat->name; ?></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <form class="search-bar-form">
                    <input id="search-bar" type="text" placeholder="Search..." />
                    <button style="background: url("../../images/icons/color/burger.png") center no-repeat;"></button>
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
                    <div class="col-md-4 col-sm-12 post-content">
                        <a href="<?php echo $post_link ?>" class="text-decoration-none">
                            <img src="https://via.placeholder.com/210" alt="Banner Image with fixed height" width="100%" style="height: 210px">
                            <!--                                 <div class="card-item">
                                    <?php echo $post_title ?>
                                </div> -->
                            <div class="heading d-flex align-items-center mt-3">
                                <div class="author-avatar"><img alt="" src="https://secure.gravatar.com/avatar/b98d69303be547bb77a999f8a65749e4?s=32&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/b98d69303be547bb77a999f8a65749e4?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" loading="lazy"></div>
                                <div class="author-name body">admin</div>
                            </div>
                            <div class="sub-text">Strategic Partnership Announcement: Aura Network partners with Ecomobi</div>
                            <div class="item-post-time my-sm-2">March 21,2022</div>
                            <div class="body item-post-txt">Today Aura Network has recently announced its next strategic partner test test test test test test test test test test</div>
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
