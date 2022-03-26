<?php
function createShareNews($attr) {
    // get post by id param
    $post = get_post($attr['id']);
    $postLink = get_post_permalink($post->ID);
    $telegramLink = 'https://t.me/share/url?url='.$postLink;
    $twitterLink = 'https://twitter.com/intent/tweet?text='.$postLink;
    $discordLink = 'https://twitter.com/intent/tweet?text='.$postLink;
    $facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=xerosanyam.github.io'.$postLink;

    $htmlRender = '
    <div class="news-shared">
        <div>Share Post</div>
        <div class="social-btn-group">
            <a href="'.$telegramLink.'">telegram</a>
            <a href="'.$twitterLink.'">twitter</a>
            <a href="'.$discordLink.'">discord</a>
            <a href="'.$facebookLink.'">facebook</a>
        </div>
    </div>
    ';

    return $htmlRender;
}
add_shortcode('news_share', 'createShareNews');