<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
    <?php
    if (have_posts()) {
        the_post();
        $title = get_the_title();
        $content = get_the_content();
         // Lấy thông tin người đăng bài viết
         $author_id = get_the_author_meta('ID');
         $author_name = get_the_author();
         $author_avatar = get_avatar_url($author_id);
         $post_date = get_the_time('F j, Y');
    }
   
    $result = <<<EOF
    
    [block id="228"]

[section label="c-cate-huongdan" bg="596" class="c-cate-huongdan c-single"]

[row label="breacrumb"]

[col span__sm="12" align="center"]

[ux_html]

[c_breadcrumb]
[/ux_html]

[/col]

[/row]
[row]

[col span="8" span__sm="12" span__md="12"]

[ux_html]


<h1>$title</h1>
<div class="single_auth">
<img src="$author_avatar" alt="$author_name Avatar">
<p>By <b>$author_name</b></p>
<p class="single_date">$post_date</p>
</div>
$content
[/ux_html]

[/col]
[col label="c-sidebar" span="4" span__sm="12" class="c-sidebar" visibility="hide-for-medium"]

[block id="250"]


[/col]

[/row]
[row]

[col span__sm="12"]

[ux_text text_align="left"]

<h2>Các bài viết liên quan</h2>
[/ux_text]
[post_cat_uxb_list col_spacing="small" columns="4" columns__sm="1" columns__md="2" show_date="text" excerpt="false" comments="false" text_align="left"]


[/col]

[/row]
[block id="595"]

[/section]

EOF;

    echo do_shortcode($result);
    ?>
</div>

<?php get_footer();