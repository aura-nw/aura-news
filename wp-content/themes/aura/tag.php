<?php
get_header();

$qObject = get_queried_object();
$isArchiveTag = (($qObject->taxonomy == 'post_tag')?true:false);
$postArgs = array(
    'post_type'    => 'news',
    'showposts'    => -1,
    'post_status'  => 'publish',
    'hide_empty' => true,
    'orderby'   => 'date',
    'order' => 'DESC',
    'tag' => ($isArchiveTag)?$qObject->slug:''
);
$thePostArr = query_posts($postArgs);
?>
<section class="news-category">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="h2 h4-mob mb-0">
                    <?php echo ($isArchiveTag) ? $qObject->name : 'Tag' ?>
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
                                <div class="post-info-contain mt-4 ">
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
<?php
get_footer();
?>
