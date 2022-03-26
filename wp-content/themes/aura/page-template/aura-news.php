<?php
/**
 * Template Name: Aura news
 * Template Post Type: page
 */
get_header();
?>
    <section class="news">
        <div class="banner-hero">Banner</div>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="category-list" id="category-list">
                        <div>demo 1</div>
                        <div>demo 2</div>
                        <div>demo 3</div>
                        <div>demo 4</div>
                        <div>demo 5</div>
                        <div>demo 6</div>
                        <div>demo 7</div>
                        <div>demo 8</div>
                        <div>demo 9</div>
                        <div>demo 10</div>
                        <div>demo 11</div>
                    </div>
                </div>
                <div class="col-2">Search bar</div>
            </div>
            <div class="row">
                <div class="col-4">Card items</div>
                <div class="col-4">Card items</div>
                <div class="col-4">Card items</div>
                <div class="col-4">Card items</div>
                <div class="col-4">Card items</div>
                <div class="col-4">Card items</div>
            </div>
        </div>
    </section>
<?php
wp_reset_postdata();
the_content();
get_footer();
?>
