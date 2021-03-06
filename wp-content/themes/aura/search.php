<?php
    get_header();
    global $wp_query;
    global $wpdb;
    $textSearch = strtolower(get_query_var('s'));
    $table_name = "tds_search_tag_trending";
    $temp = $wpdb->get_results("INSERT INTO tds_search_tag_trending (key_word, count) VALUES('$textSearch', 0) ON DUPLICATE KEY UPDATE count = count + 1");

    $params = array(
        'post_status'    => 'publish',
        'post_type'      => 'news',
        'tax_query'      => array(
            array(
                'taxonomy' => 'post_tag',
                'field' => 'slug',
                'terms' => $textSearch,
            )
        )
    );
    $thePostArr = query_posts($params);
    $resultNumber = $wp_query->found_posts;
    $resultString = $resultNumber > 1 ? ' results' : ' result';

?>
<section class="container search-container news">
    <?php
    if ( have_posts() ) : //
        ?>
        <div class="row">
            <h2 class="h2 text-center">
                We found <?php echo $resultNumber . $resultString; ?> with "<?php echo $textSearch; ?>"
            </h2>
        </div>
        <div class="row news-card__list">
    <?php
        while( have_posts() ) : the_post();
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
                                            <a href="/<?php echo $cat->slug ?>" class="aura-tag mt-3 mt-sm-0"><?php echo $cat->name; ?></a>
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
        wp_reset_postdata();
        ?>
         </div>
    <?php
    else :
    ?>
        <div class="row">
            <div class="col-12 text-center search--no-result">
                <img src="<?php echo IMAGE_URL.'/backgrounds/404@2x.png'?>"
                     srcset="<?php echo IMAGE_URL.'/backgrounds/404@1x.png'?> 1x, <?php echo IMAGE_URL.'/backgrounds/404@2x.png'?> 2x" alt=""/>
                <div class="body text--light-gray mt-5">We found <?php echo $resultNumber . $resultString; ?> with "<?php echo $textSearch; ?>"</div>
                <div class="body text--light-gray">Please try searching with another keyword</div>
            </div>
        </div>
    <?php
        endif;
    ?>
</section>
<?php
    get_footer();
?>