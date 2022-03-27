<?php
function createRelatedNews($attr)
{
    // get category by postID param
    $category = get_the_terms($attr['id'], 'category')[0];
    // get posts which belong to the category
    $args = [
        'posts_per_page'   => 4,
        'post_type' => 'news',
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'terms' => $category->term_id,
            ],
        ],
    ];
    $postArr = get_posts($args);
    $htmlRender = '
    <div class="news-related">
        <div class="sub-text">Related Posts</div>
        <div id="news-related-list" class="news-related-list">
    ';
    if ($postArr > 0) {
        foreach ($postArr as $post) {
            $post_id = $post->ID;
            $htmlRender = $htmlRender . '
            <div class="post-item">
                <a href="' . get_the_permalink($post_id) . '">
                    <img class="item-thumbnail" src="' . wp_get_attachment_url(get_post_thumbnail_id($post_id)) . '" alt="' . get_the_title($post_id) . '" width="100%" style="height: 160px">
                    <div class="item-title text--white body">' . get_the_title($post_id) . '</div>
                </a>
            </div>
            ';
        }
    }
    $htmlRenderEnd = '
        </div>
    </div>
    ';
    wp_reset_query();
    return $htmlRender . $htmlRenderEnd;
}
add_shortcode('news_related', 'createRelatedNews');
