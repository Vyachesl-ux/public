<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _headspin
 */

?>

	</div><!-- #content -->
	<?php 
		$projects = new WP_Query([
			"post_type" => "projects",
			"posts_per_page" => -1,
			]
		);

		foreach($projects->posts as $post): ?>
		<div class="modal" id="<?php echo $post->ID ?>">
			<div class="modal__dialog">
				<div class="modal-work">
					<button class="modal__close" type="button" data-close></button>
					<div class="modal-work__preview swiper">
						<div class="swiper-wrapper">
							<?php $images = get_field("project_images", $post->ID);
								foreach($images as $image):?>
									<div class="swiper-slide"><img src="<?php echo $image["url"] ?>" alt="фотография бассейна" class="modal-work__photo"></div>
								<?php endforeach
							?>
							<div class="swiper-pagination"></div>
						</div>
					</div>
					<div class="modal-work__content">
						<h4 class="modal-work__header"><?php hsl_e("характеристики") ?></h4>
						<div class="modal-work__content-wrapper">
							<?php $descriptions = get_field("description", $post->ID);
								foreach($descriptions as $description):?>
									<div class="modal-work__content-item">
										<p class="modal-text"><?php echo $description['first_col'] ?></p>
										<p class="modal-text"><?php echo $description['second_col'] ?></p>
									</div>
							<?php endforeach?>
							
						</div>
						<div class="modal-work__footer">
							<button type="button" class="slickPrev swiper-button-prev" aria-label="Previous slide"></button>
							<button type="button" class="slickNext swiper-button-next" aria-label="Next slide"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<?php endforeach ?>

	
	<footer id="colophon" class="site-footer">
		<div class="main-footer">
			<div class="main-footer__item">
				<a href="<?php echo home_url("/"); ?>" class="footer-logo" aria-label="Go to home page">
					<?php
					$logo_path = get_template_directory() . "/assets/images/icons/logo_white.svg";
					if (file_exists($logo_path)) echo file_get_contents($logo_path);
					?>
				</a>
			</div>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'container' => false, 
					'menu_class' => 'footer-menu', 
				) );
			?>

		</div>
		<div class="footer-footer">
			<span>© <?php echo date("Y"); hsl_e(" Pool4u"); ?></span>
			<div class="footer-footer__wrapp">
				<a class="privacy" href="/pool4u/public/privacy-policy"><?php echo hsl_e("Privacy policy") ?></a>
				<div style="color: #FFE27E"><?php echo hsl_e("Made by Vyacheslav Lobintsev") ?> <a style="color: #29ABE2" href="mailto:vyacheslav.lobintsev@gmail.com"><?php hsl_e("Send email to Vyacheslav") ?></a></div>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
