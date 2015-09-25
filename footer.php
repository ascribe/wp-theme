<?php
/**
 * The template for displaying the footer.
 *
 * @package ascribe
 * @since 0.1.0
 */
$year       = date("Y");
$address    = get_field('address','option');
$email      = get_field('email','option');
$consultLink= get_field('request_consultation_link','option');

$themeUrl = WPTHEME_TEMPLATE_URL . '/';

$facebook   = get_field('facebook_url','option');
if ($facebook) {
	$facebook = "<li><a href='{$facebook}' target='_blank' class='facebook'><img src='{$themeUrl}images/svg/facebook.svg' alt='Facebook' class='social-icon'></a></li>";
}

$github     = get_field('github_url','option');
if ($github) {
	$github = "<li><a href='{$github}' target='_blank' class='github'><img src='{$themeUrl}images/svg/git.svg' alt='Github' class='social-icon'></a></li>";
}

$instagram   = get_field('instagram_url','option');
if ($instagram) {
	$instagram = "<li><a href='{$instagram}' target='_blank' class='instagram'><img src='{$themeUrl}images/svg/instagram.svg' alt='Instagram' class='social-icon'></a></li>";
}

$linkedin   = get_field('linkedin_link','option');
if ($linkedin) {
	$linkedin = "<li><a href='{$linkedin}' target='_blank' class='linkedin'><img src='{$themeUrl}images/svg/linkedin.svg' alt='Linkedin' class='social-icon'></a></li>";
}

$medium    = get_field('medium_url','option');
if ($medium) {
	$medium = "<li><a href='{$medium}' target='_blank' class='medium'><img src='{$themeUrl}images/svg/medium.svg' alt='Medium' class='social-icon'></a></li>";
}

$reddit    = get_field('reddit_url','option');
if ($reddit) {
	$reddit = "<li><a href='{$reddit}' target='_blank' class='reddit'><img src='{$themeUrl}images/svg/reddit.svg' alt='Reddit' class='social-icon'></a></li>";
}

$tumblr    = get_field('tumblr_url','option');
if ($tumblr) {
	$tumblr = "<li><a href='{$tumblr}' target='_blank' class='tumblr'><img src='{$themeUrl}images/svg/tumblr.svg' alt='Tumblr' class='social-icon'></a></li>";
}

$twitter    = get_field('twitter_url','option');
if ($twitter) {
	$twitter = "<li><a href='{$twitter}' target='_blank' class='twitter'><img src='{$themeUrl}images/svg/twitter.svg' alt='Twitter' class='social-icon'></a></li>";
}



?>
<div class="chevron-divider"></div>
<footer>
	<section class="top-footer">
		<div class="centered-footer">
			<?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
			<div class="contact">
				<a href="<?php echo $consultLink; ?>" class="button small">Request a consultation</a>
				<div><?php echo $address; ?></div>
				<div><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
			</div>
		</div>
	</section>
	<section class="bottom-footer">
		<div class="centered-footer">
			<div class="copyright"><?php echo $year; ?> © ascribe GmbH</div>
			<?php wp_nav_menu( array( 'theme_location' => 'lower-footer-menu', 'container' => false ) ); ?>
			<ul class="social">
				<?php echo $facebook; ?>
				<?php echo $github; ?>
				<?php echo $instagram; ?>
				<?php echo $linkedin; ?>
				<?php echo $medium; ?>
				<?php echo $reddit; ?>
				<?php echo $tumblr; ?>
				<?php echo $twitter; ?>
			</ul>
		</div>
	</section>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>