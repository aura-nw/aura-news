<?php
    get_header();
    global $wp_query;
    $resultNumber = $wp_query->found_posts;
    $resultString = $resultNumber > 1 ? ' Results' : ' Result';
?>

<section class="container search-container news">
    <div class="row">
        <h2 class="h2 d-flex justify-content-center">
            We Found <?php echo $resultNumber . $resultString; ?> With "<?php echo get_query_var('s'); ?>"
        </h2>
    </div>

    <div class="row mt-5">
        <?php
        if ( have_posts() ) : //
            while( have_posts() ) : the_post();
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
            wp_reset_postdata();
        endif;?>
    </div>
</section>

<?php
    get_footer();
?>