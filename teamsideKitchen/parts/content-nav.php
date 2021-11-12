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
$logo = get_field('logo', 'options');
?>


<header>
	<div class="container">
		<div class="row">
			<div class="col col-logo">
				<?php if ($logo) : ?>
					<a href="<?php echo get_home_url(); ?>" class="logo">
						<?php if ($logo['mime_type'] == 'image/svg+xml') : ?>
							<?php echo file_get_contents($logo['url']); ?>
						<?php else : ?>
							<?php echo wp_get_attachment_image($logo['id'], 'logo', false, array('class' => 'img-fluid')); ?>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="col text-right d-lg-block d-none">
				<div id="menu-droite">


					<?php wp_nav_menu(array('theme_location' => 'menu_principal')); ?>


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
				</div>

			</div>
			<div class="col text-right d-lg-none d-block">
				<nav class="mobile">
					<?php wp_nav_menu(array('theme_location' => 'menu_principal')); ?>
				</nav>
				<button class="hamburger" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>

			</div>
		</div>
	</div>
</header>