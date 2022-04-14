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
        'exclude' => [
            $attr['id']
        ]
    ];
    $postArr = get_posts($args);
    $htmlRender = '
    <div class="news-related">
        <div class="sub-text title-small-mob mb-3 mb-lg-4">Related Posts</div>
        <div class="news-related-list mb-2">';
    if ($postArr > 0) {
        foreach ($postArr as $post) {
            $post_id = $post->ID;
            $htmlRender = $htmlRender . '
            <div class="post-item">
                <a href="' . get_the_permalink($post_id) . '" class="d-flex d-lg-block">
                    <img class="item-thumbnail" src="' . wp_get_attachment_url(get_post_thumbnail_id($post_id)) . '" alt="' . get_the_title($post_id) . '" width="100%">
                    <div class="item-title text--white body body-small-mob my-auto my-lg-2">' . get_the_title($post_id) . '</div>
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
