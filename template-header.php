<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-24
 * Time: 5:32 PM
 */

require 'controller/init.php';

?>
<header>
	<div class="centered-header">
		<a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-black.png" class="logo"></a>
		<div class="app-links">
			<a href="<?php echo $signInLink; ?>">Sign In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>
		</div>
		<nav class="tour-switcher"><?php wp_nav_menu( array(
				'theme_location' => 'landing-menu',
				'container'      => false
			)); ?>
		</nav>
	</div>
</header>
<div class="chevron-divider"></div>
