<?php
get_header();
// check if post exist
while ( have_posts() ) :
    the_post();
?>
    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">breadcrumb</div>
                    <!-- print post title -->
                    <div class="heading"><?php echo get_the_title(); ?></div>
                    <div class="heading">
                        <?php
                        // Get all category that post belong to that
                        $cats =  get_the_terms( get_the_ID(), 'category' );
                        foreach ($cats as $cat) {
                        ?>
                            <!-- Print category -->
                            <span><?php echo $cat->name; ?></span>
                        <?php
                        }
                        ?>
                        <!-- P publish date -->
                        <span><?php echo get_the_date() ?></span>
                    </div>
                    <div class="heading d-flex">
                        <!-- P author's avatar -->
                        <div><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></div>
                        <!-- Post author's name -->
                        <div><?php echo get_the_author() ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="featured-image">
                        <!-- Post feature image -->
                        <img src="<?php echo $thumbnail = get_the_post_thumbnail_url();?>" alt="" width="100%" style="height: 480px">

                    </div>
                    <div class="content">
                        <!-- Post content -->
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div><?php echo do_shortcode('news_share') ?></div>
                    <div><?php echo do_shortcode('[news_related id="'.get_the_ID().'"]') ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>Follow us on:</div>
                </div>
            </div>
        </div>
    </section>

<?php
endwhile; // End of the loop.
get_footer();