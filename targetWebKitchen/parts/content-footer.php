<?php
/*
		logo : image
		adresse_postale : group
			numero_et_rue : subfield
			code_postal : subfield
			ville : subfield
			lien_google_maps : subfield
			integration_maps_iframe : subfield
		numero_de_telephone : text
		fax : text
		adresse_email : email
		reseaux_sociaux : repetor
			reseau : list
			lien_vers_le_reseau : ur

		==> reseaux sociaux @get_template_part('parts/social', 'icons');
	*/
?>
<?php



?>

<?php
$logo = get_field('logo', 'options');
$mail = get_field('adresse_email', 'options');
$formulaire_news = get_field('formulaire_newsletter', 'options');
?>

<footer>
	<div class="footer-principal">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<?php if ($logo) : ?>
						<a href="<?php echo get_home_url(); ?>" class="logo">
							<?php if ($logo['mime_type'] == 'image/svg+xml') : ?>
								<?php echo file_get_contents($logo['url']); ?>
							<?php else : ?>
								<?php echo wp_get_attachment_image($logo['id'], 'logo', false, array('class' => 'img-fluid')); ?>
							<?php endif; ?>
						</a>
					<?php endif; ?>

					<?php if (have_rows('reseaux_sociaux', 'option')) : ?>
						<?php echo get_template_part('parts/social', 'icons'); ?>
						<ul class="social">
							<?php while (have_rows('reseaux_sociaux', 'option')) : the_row(); ?>
								<?php $reseau = get_sub_field('reseau');
								$lien_vers_le_reseau = get_sub_field('lien_vers_le_reseau'); ?>
								<li>
									<?php if ($reseau && $lien_vers_le_reseau) : ?>
										<a href="<?php echo $lien_vers_le_reseau; ?>">
											<svg class="icon">
												<use xlink:href="#<?php echo strtolower($reseau); ?>"></use>
											</svg>
										</a>
									<?php endif ?>
								</li>
							<?php endwhile;
							wp_reset_postdata(); ?>
						</ul>
					<?php endif; ?>

					<?php if ($mail) : ?>
						<p id="mail"><?php echo $mail; ?></p>
					<?php endif; ?>
					</div>
					<div class="col-12 col-lg-4 text-center">
					<?php if ($formulaire_news) : ?>
						<?php echo do_shortcode($formulaire_news); ?>
					<?php endif; ?>
					</div>

					
						<div class="col-12">
					<?php wp_nav_menu(array('theme_location' => 'footer_col_1')); ?>
				</div>

				
				
				



			</div>
		</div>
	</div>
	<div id="credits">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 col-lg-6 text-center text-lg-left py-1">
					<a href="https://maxime-eloir.fr" target="_blank">Création Maxime Eloir</a>
				</div>
				<div class="col-12 col-lg-6 text-center text-lg-right py-1">
					<p class="mb-0"><?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?> | Tous droits réservés</p>
				</div>
			</div>
		</div>
	</div>
</footer>