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
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.08 16.8H10.92V17.64H10.08V16.8Z" fill="black" />
                                <path d="M3.36 10.08H4.2V10.92H3.36V10.08Z" fill="black" />
                                <path d="M16.8 10.08H17.64V10.92H16.8V10.08Z" fill="black" />
                                <path d="M17.9247 3.0754C16.143 1.28356 13.771 0.200076 11.2501 0.0265784V0H9.7501V4.50004H11.2501V1.53151C15.8631 1.91392 19.5001 5.79001 19.5001 10.5001C19.5001 15.4628 15.4627 19.5002 10.5001 19.5002C5.53749 19.5002 1.5001 15.4628 1.5001 10.5001C1.49907 9.31608 1.73215 8.14354 2.18593 7.04993C2.63971 5.95631 3.30524 4.96322 4.14423 4.12776L9.5641 10.9659L10.7396 10.0343L4.34073 1.96071L3.74982 2.45712C2.12927 3.81724 0.957397 5.6352 0.387756 7.67277C-0.181885 9.71033 -0.12272 11.8725 0.557498 13.8758C1.23772 15.8792 2.50726 17.6303 4.19976 18.8998C5.89226 20.1693 7.92878 20.8978 10.0424 20.99C12.1561 21.0822 14.2483 20.5337 16.0449 19.4165C17.8415 18.2992 19.2587 16.6652 20.1108 14.7287C20.9629 12.7922 21.2101 10.6434 20.82 8.56398C20.4299 6.48456 19.4208 4.57147 17.9248 3.0754H17.9247Z" fill="black" />
                            </svg>
                            <span> Préparation: <?php echo $temps_total_de_preparation; ?></span>
                        </li>
                        <li>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.4854 0C16.2845 0 21 4.71548 21 10.5146C21 16.3138 16.2845 21 10.4854 21C4.68619 21 0 16.3138 0 10.5146C0 4.71548 4.68619 0 10.4854 0ZM10.4854 19.9163C15.6695 19.9163 19.9163 15.6987 19.9163 10.5146C19.9163 5.33054 15.6695 1.08368 10.4854 1.08368C5.30126 1.08368 1.08368 5.33054 1.08368 10.5146C1.08368 15.6987 5.30126 19.9163 10.4854 19.9163ZM13.5314 5.79916C13.0628 4.6569 11.9205 3.77824 10.4561 3.77824C9.28452 3.77824 8.14226 4.56904 7.73222 5.30126C5.41841 4.24686 3.01674 6.12134 3.01674 8.31799C3.01674 9.841 3.92469 10.8661 5.21339 11.5105C5.06695 12.8285 4.83264 14.3515 4.68619 15.6402C4.62761 16.0795 4.51046 16.6067 4.80335 16.9582C5.53556 17.1339 6.32636 17.046 7.14644 17.046H14.2929C14.7908 16.8117 14.7029 16.1967 14.7615 15.7866C14.908 14.4686 15.113 13.0042 15.2887 11.7448C17.4268 11.8033 18.8912 10.3975 18.8912 8.40586C18.8912 5.79916 15.9623 4.10042 13.5314 5.79916ZM12.682 6.64854C12.682 6.91213 12.5063 6.97071 12.5063 7.17573C12.7699 7.35146 13.0921 7.58577 13.4435 7.70293C13.7364 6.82427 14.7322 6.03347 15.9331 6.20921C17.1046 6.35565 17.8661 7.55649 17.7782 8.69874C17.6904 9.66527 16.7824 10.6318 15.3766 10.6611C15.4644 10.0753 15.4937 9.46025 14.9372 9.43096C14.3515 9.43096 14.2929 10.3389 14.205 11.1297C14.0879 11.9791 14.0586 12.7992 13.9707 13.2971H8.17155C7.35146 13.2971 6.50209 13.1799 6.61925 14C6.70711 14.4686 7.46862 14.3808 8.17155 14.3808C9.98745 14.3808 12.1255 14.3222 13.8243 14.41C13.7657 14.9372 13.7071 15.4937 13.6192 15.9623H5.76987C6.00418 14.205 6.20921 12.3305 6.44351 10.5732C5.12552 10.5146 3.98326 9.51883 4.12971 8.0251C4.36402 6.00418 7.23431 5.4477 8.25941 7.08787C8.31799 5.9749 9.13808 5.00837 10.1632 4.89121C11.364 4.74477 12.3891 5.50628 12.682 6.64854Z" fill="black" />
                            </svg>
                            </span><?php echo $difficulte; ?></span>
                        </li>
                        <li>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2875 9.1875C10.7625 9.05625 10.2375 8.79375 9.84375 8.4C9.45 8.26875 9.31875 7.875 9.31875 7.6125C9.31875 7.35 9.45 6.95625 9.7125 6.825C10.1062 6.5625 10.5 6.3 10.8938 6.43125C11.6813 6.43125 12.3375 6.825 12.7312 7.35L13.9125 5.775C13.5188 5.38125 13.125 5.11875 12.7312 4.85625C12.3375 4.59375 11.8125 4.4625 11.2875 4.4625V2.625H9.7125V4.4625C9.05625 4.59375 8.4 4.9875 7.875 5.5125C7.35 6.16875 6.95625 6.95625 7.0875 7.74375C7.0875 8.53125 7.35 9.31875 7.875 9.84375C8.53125 10.5 9.45 10.8938 10.2375 11.2875C10.6313 11.4188 11.1562 11.6813 11.55 11.9438C11.8125 12.2063 11.9438 12.6 11.9438 12.9937C11.9438 13.3875 11.8125 13.7812 11.55 14.175C11.1562 14.5688 10.6313 14.7 10.2375 14.7C9.7125 14.7 9.05625 14.5688 8.6625 14.175C8.26875 13.9125 7.875 13.5188 7.6125 13.125L6.3 14.5688C6.69375 15.0938 7.0875 15.4875 7.6125 15.8813C8.26875 16.275 9.05625 16.6687 9.84375 16.6687V18.375H11.2875V16.4062C12.075 16.275 12.7313 15.8812 13.2563 15.3562C13.9125 14.7 14.3062 13.65 14.3062 12.7312C14.3062 11.9437 14.0437 11.025 13.3875 10.5C12.7312 9.84375 12.075 9.45 11.2875 9.1875ZM10.5 0C4.725 0 0 4.725 0 10.5C0 16.275 4.725 21 10.5 21C16.275 21 21 16.275 21 10.5C21 4.725 16.275 0 10.5 0ZM10.5 19.5562C5.5125 19.5562 1.44375 15.4875 1.44375 10.5C1.44375 5.5125 5.5125 1.44375 10.5 1.44375C15.4875 1.44375 19.5562 5.5125 19.5562 10.5C19.5562 15.4875 15.4875 19.5562 10.5 19.5562Z" fill="black" />
                            </svg>

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
<?php if($same_category->have_posts()) : ?>
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