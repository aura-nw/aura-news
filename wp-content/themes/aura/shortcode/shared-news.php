<?php
function createShareNews($attr)
{
    // get post by id param
    $post = get_post($attr['id']);
    $postLink = get_post_permalink($post->ID);
    $telegramLink = 'https://t.me/share/url?url=' . $postLink;
    $twitterLink = 'https://twitter.com/intent/tweet?text=' . $postLink;
    $discordLink = 'https://twitter.com/intent/tweet?text=' . $postLink;
    $facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' . $postLink;
    $pinterestLink = 'https://pinterest.com/pin/create/button/?url='.$postLink;
    $linkedinLink = 'https://www.linkedin.com/sharing/share-offsite/?url='.$postLink;
    $tumblrLink = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' .$postLink;

    $facebookIcon = IMAGE_URL . '/icons/basic/facebook.png';
    $telegramIcon = IMAGE_URL . '/icons/basic/telegram.png';
    $twitterIcon = IMAGE_URL . '/icons/basic/twitter.png';
    $pinterestIcon = IMAGE_URL . '/icons/basic/pinterest.png';
    $linkedinIcon = IMAGE_URL . '/icons/basic/linkedin.png';
    $tumblrIcon = IMAGE_URL . '/icons/basic/tumblr.png';

    $htmlRender = '
    <div class="news-shared">
        <div class="sub-text-redig">Share Post</div>
        <div class="social-btn-group d-flex justify-content-start justify-content-lg-between">
            <a class="me-3 me-lg-0" href="' . $telegramLink . '">
                <img src="' . $telegramIcon . '" alt="" width="18" height="18">
            </a>
            <a class="me-3 me-lg-0" href="' . $twitterLink . '">
                <img src="' . $twitterIcon . '" alt="" width="18" height="18">
            <a class="me-3 me-lg-0" href="' . $facebookLink . '">
                <img src="' . $facebookIcon . '" alt="" width="18" height="18">
            </a>
            <a class="me-3 me-lg-0" href="' . $pinterestLink . '">
                <img src="' . $pinterestIcon . '" alt="" width="18" height="18">
            </a>
            <a class="me-3 me-lg-0" href="' . $linkedinLink . '">
                <img src="' . $linkedinIcon . '" alt="" width="18" height="18">
            </a>
            <a class="me-3 me-lg-0" href="' . $tumblrLink . '">
                <img src="' . $tumblrIcon . '" alt="" width="18" height="18">
            </a>
        </div>
    </div>
    ';

    return $htmlRender;
}
add_shortcode('news_share', 'createShareNews');
