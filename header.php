<?php
/**
 * The template for displaying the header.
 *
 * @package ascribe
 * @since 0.1.0
 */
require 'controller/header.php';
$controller = new Controller();

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js  ie6 oldie" lang="en" itemscope itemtype="https://schema.org/Organization"> <![endif]-->
<!--[if IE 7]>    <html class="no-js  ie7 oldie" lang="en" itemscope itemtype="https://schema.org/Organization"> <![endif]-->
<!--[if IE 8]>    <html class="no-js  ie8 oldie" lang="en" itemscope itemtype="https://schema.org/Organization"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js " lang="en" itemscope itemtype="https://schema.org/Organization" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title ?></title>
	<base href="<?php echo $url; ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="description" content="<?php echo $description ?>">
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $url; ?>" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>" />

	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo $title; ?>">
	<meta name="twitter:description" content="<?php echo $description ?>">
	<meta name="twitter:image:src" content="<?php echo $image; ?>">
	<meta name="twitter:domain" content="<?php echo $url; ?>">

	<meta itemprop="name" content="<?php echo $title; ?>">
	<meta itemprop="description" content="<?php echo $description ?>">
	<meta itemprop="image" content="<?php echo $image; ?>">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/manifest.json">
	<meta name="msapplication-TileColor" content="#00a300">
	<meta name="msapplication-TileImage" content="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
	<link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">

	<div class="scrollpos"></div>
	<?php
	$headerClass = '';
	$indexHeadContent = '';
	$indexHead = '';
	$headerImageMarkup = '';
	if (is_front_page()) {
		$headerClass = 'index';
		$indexHeadContent   = $controller->indexHeader();
		$indexMobileBg      = get_field('mobile_video_replacement_image')['url'];
		$indexHead = "<section class='indexHead' style='background-image:url({$indexMobileBg})'>{$indexHeadContent}</section>";
	}
	?>
	<header class="<?php echo $headerClass; ?>">
		<div class="centered">
			<?php echo $logo; ?>
			<span class="icon-menu mobile-only"></span>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) ); ?>
			</nav>
		</div>
	</header>
	<?php echo $indexHead; ?>
