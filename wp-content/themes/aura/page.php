
<?php get_header(); ?>
    <section id="main-body">
        <div class="page-default">
            <div id="content">
                <?php while( have_posts() ) : the_post();?>
                    <div class="main-content">
                        <div class="page">
                            <h3><?php the_title();?></h3>
                            <div class="the-content">
                                <?php echo apply_filters('the_content', get_the_content()); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
            <!-- end content -->
        </div>
    </section>
<?php get_footer(); ?>
