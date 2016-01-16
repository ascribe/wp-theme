<?php
/**
 * The template for displaying the header.
 *
 * @package ascribe
 * @since 0.1.0
 */
require 'controller/init.php';
$controller = new Controller();

if (!isset($headColour)) {
    $headColour = '';
}

if (is_home()) {
    $title = "Blog | ascribe";
}
if ( is_category() || is_tag() ) {
    $title = single_term_title( '', false ) . ' | Blog | ascribe';
}

?>

<!doctype html>
<html class="no-js " lang="en" itemscope itemtype="https://schema.org/Organization" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo $title ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="description" content="<?php echo $description ?>">

    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $permalink; ?>" />
    <meta property="og:image" content="<?php echo $shareimage; ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description ?>">
    <meta name="twitter:image" content="<?php echo $shareimage; ?>">
    <meta name="twitter:site" content="<?php echo $twitter; ?>">

    <meta itemprop="name" content="<?php echo $title; ?>">
    <meta itemprop="description" content="<?php echo $description ?>">
    <meta itemprop="image" content="<?php echo $shareimage; ?>">

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
    <meta name="msapplication-TileColor" content="#d6137c">
    <meta name="msapplication-TileImage" content="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/ico/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Typekit -->
    <script>
    (function(d) {
        var config = {
            kitId: 'gma2yhj',
            scriptTimeout: 3000
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-60614729-2', 'auto');
      ga('send', 'pageview');

    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class($headColour); ?> >
<div class="wrapper">
