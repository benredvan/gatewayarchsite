<?php
if (have_posts()) : while (have_posts()) : the_post();
	
	$page_id = get_the_ID();
	$page_title = get_the_title();
	$page_date = get_the_date();
	$page_date = date("d F Y", strtotime($page_date));
	$news_content = get_the_content();
	$news_content = apply_filters('the_content', $news_content);
	$news_content = str_replace(']]>', ']]&gt;', $news_content);

	$page_link = get_permalink();
	
	$page_categories = get_the_category();
	
	//$featured_image = get_field("featured_image");
	
	$previous_post = get_previous_post();
	$next_post = get_next_post();
	
endwhile; endif;

get_header();

echo("<div class=\"page-container\">\n");
echo("	<div class=\"page\">\n");

echo("		<div class=\"sidebar\">\n");
echo("			<div class=\"sidebar-box\">\n");

echo("				<h3>Filter by:</h3>\n");

echo("				<li><a href=\"".site_url()."/category/our-thinking/\">Our Thinking</a></li>\n");
wp_list_categories(array(
	'title_li'				=> '',
	'show_count'			=> true,
	'use_desc_for_title'	=> false,
	'child_of'				=> 5
));

echo("				<li><a href=\"".site_url()."/category/news/\">News</a></li>\n");
wp_list_categories(array(
	'title_li'				=> '',
	'show_count'			=> true,
	'use_desc_for_title'	=> false,
	'child_of'				=> 31
));

echo("				<div class=\"search-form\">\n");
echo("					<input type=\"text\" />\n");
echo("					<input type=\"button\" class=\"submit-filter-button button-form\" value=\"GO\" />\n");
echo("				</div>\n");

echo("				<div class=\"newsletter-signup\"><a href=\"#\">Newsletter Sign Up</a></div>\n");

echo("			</div>\n");

$category_string = "";
$category_term_string = "";
foreach ($page_categories as $category) {
	$category_string .= $category->name." / ";
	$category_term_string .= $category->slug.",";
}
$category_string = substr($category_string, 0, -3);
$category_term_string = substr($category_term_string, 0, -1);

echo("			<div class=\"blog-posts\">\n");
echo("				<div class=\"module\">\n");
echo do_shortcode("[ajax_load_more post_type=\"post\" category=\"".$category_term_string."\" post__not_in=\"".$page_id."\" scroll=\"false\" posts_per_page=\"2\" ]");
echo("				</div>\n");
echo("			</div>\n");

echo("		</div>\n");

echo("		<div class=\"page-content\">\n");
echo("			<div class=\"categories\">\n");
echo($category_string);
echo("			</div>\n");
echo("			<h2>".$page_title."</h2>\n");
echo("			<div class=\"date\">".$page_date."</div>\n");
echo("			<div class=\"body\">".$news_content."</div>\n");
echo("		</div>\n");

echo("		<div class=\"clear\"></div>\n");

echo("	</div>\n");
echo("</div>\n");

get_footer();
?>