<?php
/*
 Template Name: Page Home
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>


<section class="home__savoirsFaire section--grey">
	<div class="maxWrap">
		<div class="minWrap">
			<header class="cf">
				<?php if(get_field("intro")): ?><div class="section__intro"><?php echo get_field("intro"); ?></div><?php endif; ?>
				<h2><?php echo get_field_escaped("sf_titre"); ?></h2>
				<div class="section__intro"><?php echo get_field("sf_intro"); ?></div>
			</header>

			<?php if( have_rows('sf_competences') ): ?>
				<div class="competences gridy gridy-m-2 gridy-l-3 gridy-center g-equal-height">
					<?php while( have_rows("sf_competences") ): the_row(); 
						$icone = get_sub_field('picto');
						$name = get_sub_field('titre');
						$desc = nl2br(get_sub_field("description"));

						$ifLinkTax = get_sub_field("lien_category");
						$ifLinkPage = get_sub_field("lien_page");
					?>
					<div class="coly competence">
						<?php if($ifLinkPage || $ifLinkTax){
							if($ifLinkTax){
								echo "<a href='".esc_url(get_term_link($ifLinkTax))."'>";
							}else{
								echo "<a href='".esc_url($ifLinkPage)."'>";
							}
						}?>
							<?php if($icone):  ?>
								<div class="competence__icone icone icone--anim">
									<?php echo file_get_contents($icone["url"]); ?>
								</div>
							<?php endif;?>
							<h3 class="competence__name"><?=$name?></h3>
							<div class="competence__desc"><?=$desc?></div>
						<?php if($ifLinkPage || $ifLinkTax){ echo "</a>"; } ?>
					</div>
					<?php endwhile; ?>
				</div>
				<footer><a href="<?php echo esc_url( get_permalink(88) ); ?>" class="button">Découvrir</a></footer>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="home__portfolio">
	<div class="maxWrap">
		<div class="minWrap">
			<header class="cf">
				<h2><?php echo get_field_escaped("port_titre"); ?></h2>
				<div class="section__intro"><?php echo get_field("port_intro"); ?></div>
			</header>

			<div class="portfolioWrapper">
				<div class="portfolio__filters">
				<?php
					$categories =  get_categories();
					echo "<ul class='portfolio__filters__ul cl-effect-1'>";
					  echo "<li class='filter filter--active ' data-filter='all'>Tout</li>";
					foreach  ($categories as $category) {
						if($category->slug != "non-classe") echo "<li class='filter' data-filter='".$category->term_id."'>". $category->cat_name ."</li>";
					}
					echo '</ul>';
				?>
				</div>

				<div class="portfolio__list cf gridy gridy-no-gutter  gridy-s-2 gridy-m-3 gridy-l-4 filtr-container">
				<?php $projets = get_posts(array("post_type"=>"projet",'orderby' => 'date', 'numberposts' => 8, 'order' => 'DESC')); ?>
				<?php if( count($projets) > 0 ): ?>
					<?php foreach($projets as $projet ): ?>
						<?php
							$style=""; $BG = get_field("vignette", $projet->ID); 
							if($BG){
								$bg_src = $BG['sizes']['project-thumb'];
								$style = "background:url(".$bg_src.") center center no-repeat; background-size:cover"; 
							}else{
								$bg_src = get_template_directory_uri()."/library/images/noImage.jpg";
							}
							$categories =  get_the_terms($projet->ID, 'category');
							$listeC = "";
							foreach ($categories as $key => $value) {
								$listeC .= $value->term_id.", ";

							}
							$listeC = rtrim($listeC, ', '); 

						?>
						
						<div class="filtr-item coly "  data-category="<?=$listeC?>">
							<div class="projet">
								<img src="<?=$bg_src?>" class="projet__thumb" alt="" />
								<div class="projet__hover">
									<a href="<?php echo esc_url( get_permalink($projet->ID) ); ?>">
										<h3 class="projet__title"><?php echo get_the_title($projet->ID) ?></h3>
										<div class="projet__subtitle"><?php echo nl2br(get_field_escaped("sous-titre", $projet->ID)); ?></div>
									</a>
								</div>
							</div>
						</div>
					
					<?php endforeach; ?>
				<?php endif; ?>	
				</div>
			</div>
			<footer><a href="<?php echo esc_url( get_permalink(91) ); ?>" class="button">Tout voir</a></footer>
		</div>
	</div>
</section>

<?php if(get_field("pf_ctc")): ?>
<section class="home__plus">
	<div class="maxWrap">
		<div class="minWrap">
			<header class="cf">
				<div class="section__intro"><?php echo get_field("pf_ctc"); ?></div>
			</header>
		</div>
	</div>
	<div class="home__blocContact">
		<div class="maxWrap">
			<div class="minWrap cf">
				<div class="home__blocContact__left"><?php echo get_field("bloc_ctc"); ?></div>
				<div class="home__blocContact__right"><a href="<?php echo esc_url( get_permalink(93) ); ?>" class="button">Nous contacter</a></div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="home__equipe section--grey">
	<div class="maxWrap">
		<div class="minWrap">
			<header class="cf">
				<h2><?php echo get_field_escaped("eq_titre"); ?></h2>
			</header>
			<?php if( have_rows('membres') ): ?>
			<div class="membres gridy gridy-m-2 gridy-l-4 cf">
			<?php while( have_rows("membres") ): the_row(); 
				$thumb = get_sub_field("image"); $thumb_src = $thumb["sizes"]["equipe-thumb2"];
				$thumbHover = get_sub_field("image_hover"); $thumbHover_src = $thumbHover["sizes"]["equipe-thumb2"];
			?>
				<div class="membre coly">
					<img src="<?=$thumb_src?>" alt="" class="membre__thumb" data-srchover="<?=$thumbHover_src?>" data-src="<?=$thumb_src?>" />
					<div class="membre__identite">
						<h3 class="membre__nom"><?php echo get_sub_field("nom"); ?></h3>
						<div class="membre__poste"><?php echo get_sub_field("poste"); ?></div class="membre__poste">
						<?php if(get_sub_field("lien_linkedin")){
							echo "<a href='".get_sub_field("lien_linkedin")."' target='_blank' class='membre__ln'><img src='".get_template_directory_uri()."/library/images/ico_linkedin.png' alt='' /></a>";
						} ?>
					</div>
				</div>
			<?php endwhile; ?>
			<script  type='text/javascript'>
			jQuery(document).ready(function(){
				jQuery(".membre__thumb").hover(
					function() {jQuery(this).attr("src",jQuery(this).data("srchover"));},
					function() {jQuery(this).attr("src",jQuery(this).data("src"));
				});
			});
			</script>
			</div>
			<?php endif; ?>	
		</div>
	</div>
</section>

<?php get_footer(); ?>
