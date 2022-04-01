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
        <div class="sub-text">Share Post</div>
        <div class="social-btn-group d-flex">
            <a class="me-3" href="' . $telegramLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-telegram"></i>
            </a>
            <a class="me-3" href="' . $twitterLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-twitter"></i>
            </a>
            <a class="me-3" href="' . $facebookLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-fb"></i>
            </a>
            <a class="me-3" href="' . $pinterestLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-pinterest"></i>
            </a>
            <a class="me-3" href="' . $linkedinLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-linkedin"></i>
            </a>
            <a class="me-3" href="' . $tumblrLink . '">
                <i class="aura-icon icon--switch-stage aura-icon-tumblr"></i>
            </a>
        </div>
    </div>
    ';

    return $htmlRender;
}
add_shortcode('news_share', 'createShareNews');
