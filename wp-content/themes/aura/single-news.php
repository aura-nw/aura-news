<?php
get_header();
while ( have_posts() ) :
    the_post();
?>
    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">breadcrumb</div>
                    <div class="heading">Title</div>
                    <div class="heading">category + date</div>
                    <div class="heading">Author</div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="featured-image"></div>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div><?php echo do_shortcode('news_share') ?></div>
                    <div><?php echo do_shortcode('news_related') ?></div>
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