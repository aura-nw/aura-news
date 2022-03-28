<?php
function createShareNews($attr)
{
    // get post by id param
    $post = get_post($attr['id']);
    $postLink = get_post_permalink($post->ID);
    $telegramLink = 'https://t.me/share/url?url=' . $postLink;
    $twitterLink = 'https://twitter.com/intent/tweet?text=' . $postLink;
    $discordLink = 'https://twitter.com/intent/tweet?text=' . $postLink;
    $facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=xerosanyam.github.io' . $postLink;
    $pinterest = 'https://pinterest.com/pin/create/button/?url='.$postLink;
    $linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url='.$postLink;
    $tumblr = 'https://www.tumblr.com/widgets/share/tool?posttype=link&caption='.$postLink.'&shareSource=tumblr_share_button';

    $facebookIcon = IMAGE_URL . '/icons/basic/facebook.png';
    $telegramIcon = IMAGE_URL . '/icons/basic/telegram.png';
    $twitterIcon = IMAGE_URL . '/icons/basic/twitter.png';

    $htmlRender = '
    <div class="news-shared">
        <div class="sub-text-redig">Share Post</div>
        <div class="social-btn-group">
            <a href="' . $telegramLink . '">
                <img src="' . $telegramIcon . '" alt="" width="18" height="18">
            </a>
            <a href="' . $twitterLink . '">
                <img src="' . $twitterIcon . '" alt="" width="18" height="18">
            <a href="' . $facebookLink . '">
                <img src="' . $facebookIcon . '" alt="" width="18" height="18">
            </a>
        </div>
    </div>
    ';

    return $htmlRender;
}
add_shortcode('news_share', 'createShareNews');
