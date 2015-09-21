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
?>
<footer>
	<section class="top-footer">
		<div class="centered-footer">
			<?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
			<div class="contact">
				<a href="<?php echo $consultLink; ?>">Request a consultation</a>
				<div><?php echo $address; ?></div>
				<div><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
			</div>
		</div>
	</section>
	<section class="bottom-footer">
		<div class="centered-footer">
			<?php echo $year; ?> © ascribe GmbH
			<?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
			<ul class="social"></ul><!-- TODO: social nav -->
		</div>
	</section>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>