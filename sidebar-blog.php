<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-25
 * Time: 1:10 PM
 */
$controller = new Subtemplate();
$banner = get_field('banner_for_blog_sidebar','option');

$image = '';
if ($banner) {
	$image = "<img src='{$banner['url']}' alt='{$banner['alt']}'>";
}
?>

<aside class="blog-sidebar">
	<?php echo $image; ?>
	<?php  echo $controller->blogFeatures("sidebar"); ?>
</aside>