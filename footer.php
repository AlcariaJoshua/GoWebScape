<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gowebscape
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="wrapper">
			<div class="content">
				<div class="links-container">

					<div class="links">
						<h3>Quick Links</h3>
						<a href="<?php echo get_home_url() ?>/">Home</a>
						<a href="<?php echo get_home_url() ?>/">About Us</a>
						<a href="<?php echo get_home_url() ?>/">Web Design</a>
						<a href="<?php echo get_home_url() ?>/">Our Work</a>
						<a href="<?php echo get_home_url() ?>/">Reviews</a>
						<a href="<?php echo get_home_url() ?>/">Contact Us</a>
					</div>
					<div class="links">
						<h3>Our Services</h3>
						<a href="<?php echo get_home_url() ?>/">Website Design</a>
						<a href="<?php echo get_home_url() ?>/">Logo Design</a>
						<a href="<?php echo get_home_url() ?>/">iPhone App Development</a>
						<a href="<?php echo get_home_url() ?>/">Content Management</a>
						<a href="<?php echo get_home_url() ?>/">eCommerce Website Design</a>
						<a href="<?php echo get_home_url() ?>/">Search Engine Optimization</a>
					</div>
					<div class="links">
						<h3>Our Work</h3>
						<a href="<?php echo get_home_url() ?>/">Websites Built</a>
						<a href="<?php echo get_home_url() ?>/">Logos Designed</a>
						
						<div class="social">
							<h3>Follow Us</h3>
							<a href="<?php echo get_home_url() ?>/">Facebook</a>
							<a href="<?php echo get_home_url() ?>/">LinkedIn</a>
						</div>
					</div>
					<div class="links">
						<h3>Contact Us</h3>
						<p>If you have any questions please feel free to contact us and we well get back to you straight away.</p>
						
						<div class="social">
							<a href="tel:02 9034 4333">02 9034 4333</a>
							<a href="mailto:contact@gowebscape.com">contact@gowebscape.com</a>
						</div>
					</div>

				</div>
				<div class="copy-right">
					<a href="<?php echo get_home_url() ?>/">
						<div class="image">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/gowebscape_logo.jpg" alt="">
						</div>
					</a>
					
					<p>Copyright 2025 Go Web Scape | All rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit-icons.min.js"></script>


<?php wp_footer(); ?>

</body>
</html>
