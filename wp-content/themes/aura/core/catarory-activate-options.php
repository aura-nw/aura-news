<?php

//Title & desciption
function information_section_description(){
    echo '<p>Select categories to show</p>';
}
function create_category_news_options(){
// Get all categories of news post-type
    $argsCats = array(
        'hide_empty' => 0,
        'pad_counts' => true,
        'taxonomy'=> 'category',
        'type' => 'news'
    );
    $categoryArr = get_categories($argsCats);
    // Hàm tạo fiels contact
    ?>
    <!-- header -->
    <div style="margin-bottom: 24px">
        <label for="header_menu_cats" style="font-weight: bold">Header Menu</label><br>
        <div style="display: flex; flex-wrap: wrap">
            <?php
            foreach ($categoryArr as $cat) {
                ?>
                <div style="margin: 8px 16px">
                    <input type="checkbox" name="header_menu_cats[]"
                           value="<?php echo $cat->slug; ?>"
                        <?php echo (get_option('header_menu_cats') == null || !in_array($cat->slug, get_option('header_menu_cats'))) ? '' : 'checked="checked"'; ?> /><?php echo $cat->name; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- home page -->
    <div style="margin-bottom: 24px">
        <label for="header_menu_cats" style="font-weight: bold">Home Page Categories</label><br>
        <div style="display: flex; flex-wrap: wrap">
            <?php
            foreach ($categoryArr as $cat) {
                ?>
                <div style="margin: 8px 16px">
                    <input type="checkbox" name="home_page_cats[]"
                           value="<?php echo $cat->slug; ?>"
                        <?php echo (get_option('home_page_cats') == null || !in_array($cat->slug, get_option('home_page_cats'))) ? '' : 'checked="checked"'; ?> /><?php echo $cat->name; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- footer -->
    <div>
        <label for="footer_menu_cats" style="font-weight: bold">Footer Menu</label><br>
        <div style="display: flex; flex-wrap: wrap">
            <?php
            foreach ($categoryArr as $cat) {
                ?>
                <div style="margin: 8px 16px">
                    <input type="checkbox" name="footer_menu_cats[]"
                           value="<?php echo $cat->slug; ?>"
                        <?php echo (get_option('footer_menu_cats') == null || !in_array($cat->slug, get_option('footer_menu_cats'))) ? '' : 'checked="checked"'; ?> /><?php echo $cat->name; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

// Tạo 1 section category_news
function create_information_settings(){
    add_option('first_field_option',1);// add theme option to database
    // Khai báo các section
    add_settings_section( 'category_news', 'Category Activation',
        'information_section_description','theme-options');

    // Gọi hàm tạo field -> nhúng vào section category_news
    add_settings_field('category_activated', 'News manager: ',
        'create_category_news_options', 'theme-options', 'category_news');

    // Đăng ký option
    $optionArgs = array(
        'type' => 'array',
        'description' => 'Category ativated',
        'default' => NULL,
    );
    register_setting( 'theme-options-grp', 'header_menu_cats', $optionArgs);
    register_setting( 'theme-options-grp', 'home_page_cats', $optionArgs);
    register_setting( 'theme-options-grp', 'footer_menu_cats', $optionArgs);
}
add_action('admin_init','create_information_settings');

