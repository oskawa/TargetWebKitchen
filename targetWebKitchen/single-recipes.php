<?php
$nom_de_la_recette = get_field('nom_de_la_recette');
$descriptif_rapide_de_la_recette = get_field('descriptif_rapide_de_la_recette');
$temps_total_de_preparation = get_field('temps_total_de_preparation');
$difficulte = get_field('difficulte');
$prix_estime = get_field('prix_estime');
$image_en_avant = get_the_post_thumbnail_url();
$ustensiles = get_field('listes_ustensiles');
$video = get_field('video');
$attr =  array(
    'mp4'      => $video,
    'preload'  => 'auto'
);
?>

<?php get_header(); ?>
<section id="hero-recette" style="background-image:url(<?php echo $image_en_avant; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $nom_de_la_recette; ?></h1>
            </div>

        </div>
    </div>
</section>

<section id="recette">
    <div class="container">

        <div class="row">

            <div class="col-12 col-lg-4 m-auto">
                <div id="description">
                    <h2>Description</h2>
                    <p>
                        <?php echo $descriptif_rapide_de_la_recette; ?>
                    </p>
                    <ul>
                        <li>

                            <?php echo file_get_contents(get_template_directory() . '/images/preparation.svg'); ?>
                            <span> <?php echo $temps_total_de_preparation; ?></span>
                        </li>
                        <li>
                            <?php echo file_get_contents(get_template_directory() . '/images/difficulte.svg'); ?>
                            </span><?php echo $difficulte; ?></span>
                        </li>
                        <li>
                        <?php echo file_get_contents(get_template_directory() . '/images/prix.svg'); ?>

                            </span><?php echo $prix_estime; ?></span>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div id="video">
                    <?php echo wp_video_shortcode($attr); ?>
                </div>
            </div>
            <div class="col-12 col-lg-3 sticky">
                <div id="ingredients">

                    <?php if (have_rows('liste_ingredients')) : ?>
                        <p id="titre-ingredient">Ingrédients</p>
                        <ul>
                            <?php
                            $cpt = 1;
                            while (have_rows('liste_ingredients')) : the_row();
                                $ingredients = get_sub_field('ingredients');
                                $quantite_ingredients = get_sub_field('quantite_ingredients'); ?>
                                <li class="ingredient">
                                    <p><span><?php echo $quantite_ingredients; ?> </span><?php echo $ingredients; ?></p>

                                </li>
                                <?php $cpt++; ?>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12">
                <div id="etapes">
                    <hr>
                    <h3>Etapes de préparation</h3>
                    <?php if (have_rows('etapes_de_la_recette')) : ?>
                        <ul>
                            <?php
                            $cpt = 1;
                            while (have_rows('etapes_de_la_recette')) : the_row();
                                $etape = get_sub_field('etape'); ?>
                                <li>
                                    <p class="chiffre"><?php echo $cpt; ?>.</p>
                                    <p class="explication"><?php echo $etape; ?></p>
                                </li>
                                <?php $cpt++; ?>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>



                </div>
                <?php if ($ustensiles) : ?>
                    <div id="ustensiles">
                        <h3>Ustensiles</h3>
                        <?php $cpts = 1; ?>
                        <?php foreach ($ustensiles as $ustensile) : ?>

                            <div class="col-12 col-lg-2 d-inline-flex">
                                <?php $image = get_field('photo_de_lustensile', 'ustensiles_' . $ustensile->term_id); ?>
                                <div class="ustensiles">
                                    <div class="image-ustensiles">
                                        <img src="<?php echo $image['url']; ?>" alt="">
                                    </div>
                                    <div class="texte-ustensiles">
                                        <p> <?php echo $ustensile->name; ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php if ($cpts % 4 == 0) : ?>

                                <div class="col-4"></div>
                            <?php endif; ?>


                            <?php $cpts++; ?>

                        <?php endforeach; ?>
                    </div>
            </div>
        <?php endif; ?>
        </div>

    </div>
    </div>
</section>




<?php

global $post;
$current_category = get_the_category();
$same_category = new WP_Query(array(
    'post_type' => $post_type,
    'cat'            => $current_category[0]->cat_ID,
    'post__not_in'   => array($post->ID),
    'orderby'        => 'rand',
    'posts_per_page' => 5
));
?>
<?php if ($same_category->have_posts()) : ?>
    <section id="recettes-similaires">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Plus de recettes similaires</h3>
                </div>





                <?php while ($same_category->have_posts()) : $same_category->the_post(); ?>
                    <?php echo get_template_part('parts/content', 'thumbnailRecipes'); ?>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>