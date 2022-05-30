<?php
get_header();
// check if post exist
$showBanner = get_field('show_feature_image_as_banner');
while (have_posts()) :
    the_post();
?>
<section class="news-details">
    <div class="container px-4">
        <div class="row">
            <div class="col-12">
                <div class="heading sub-text text--white breadcrumb">
                    <a href="/"> Insights </a>
                </div>
                <!-- print post title -->
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <h1 class="heading"><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
                <div class="heading heading-title body-small">
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
                    </div>
                    <!-- Publish date -->
                    <span class="text--light-gray mt-3 mt-sm-0"><?php echo get_the_date() ?></span>
                </div>
                <div class="d-lg-none mt-3 mb-5"><?php echo do_shortcode("[news_share id='" . get_the_ID() . "']") ?></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-9">
                <?php
                    if($showBanner):
                ?>
                    <div class="featured-image">
                        <!-- Post feature image -->
                        <img src="<?php echo $thumbnail = get_the_post_thumbnail_url(); ?>" alt="">
                    </div>
                <?php
                    endif;
                ?>
                <div class="content body">
                    <!-- Post content -->
                    <?php the_content(); ?>
                </div>
                <div class="social-group-contain">
                    <div class="title-small">Follow us on</div>
                    <div class="social-group">
                        <?php echo do_shortcode('[elementor-template id="905"]'); ?>
                    </div>
                </div>
                <?php
                    $tags = get_the_tags();
                    if($tags && count($tags) > 0) :
                ?>
                    <div class="tags">
                        <div class="title-small mb-4">Tags</div>
                        <?php
                            foreach ( $tags as $tag ) {
                                $tag_link = get_tag_link( $tag->term_id );
                                ?>
                                    <a href="<?php echo $tag_link; ?>" class="aura-tag mb-3"><span>#<?php echo $tag->name; ?></span></a>
                                <?php
                            }
                        ?>
                    </div>
                <?php
                    endif;
                ?>
            </div>
            <div class="col-12 col-lg-3 ps-lg-5 mt-5 mt-lg-0">
                <div class="mb-5 d-none d-lg-block"><?php echo do_shortcode("[news_share id='" . get_the_ID() . "']") ?></div>
                <div class="mt-3"><?php echo do_shortcode("[news_related id='" . get_the_ID() . "']") ?></div>
            </div>
        </div>
    </div>
</section>
<?php
endwhile; // End of the loop.
get_footer();
