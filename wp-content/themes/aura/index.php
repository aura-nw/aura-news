<?php get_header(); ?>
    <section>
        <?php if ( have_posts() ) : // kiểm tra xem biến $wp_query của WordPress có giá trị chưa, mặc định hàm này sẽ kiểm tra query trong $wp_query
            while( have_posts() ) : // kiểm tra số lần lặp dựa trên số lượng bài viết được thực thi bởi $wp_query
                the_post(); // kiểm tra loop xem bài đã được loop chưa, nếu rồi thì bỏ qua và loop bài kế
                the_content(); // hiển thị nội dung của post.
            endwhile;
        else : // nếu $wp_query không có nội dung
                include("404.php");
        endif;?>
    </section>
<?php get_footer(); ?>
