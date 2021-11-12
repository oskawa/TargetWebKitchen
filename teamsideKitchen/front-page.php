<?php get_header(); ?>
<?php
$image_hero = get_field('image_hero');
$sous_titre = get_field('sous-titre');
$logo_custom = get_field('logo_custom');
$titre_section_presentation = get_field('titre_section_presentation');
$titre_section_presentation_deux = get_field('titre_section_presentation_deux');
$texte_section_presentation = get_field('texte_section_presentation');
$lien_renvoi_decouvrir = get_field('lien_renvoi_decouvrir');
$image_presentation = get_field('image_presentation');
$image_de_fond_accueil = get_field('image_de_fond_accueil', 'options');
?>


<section id="hero" >
<div id="image_de_fond" style="background-image:url(<?php echo $image_hero['url']; ?>);"></div>

    <div class="container h-100">
        <div class="row h-100 justify-content-end align-content-center">
            <div class="col-12 col-lg-5 p-relative">
                <div id="fond_carotte">
                    <svg width="252" height="266" viewBox="0 0 252 266" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.34427 263.068C26.7265 283.29 176.88 193.63 199.114 155.863C209.786 137.723 197.187 111.108 176.584 89.8456C200.003 74.2333 220.607 122.854 240.173 112.595C249.066 107.837 254.847 93.1167 250.549 84.0467C242.841 67.9883 217.198 67.9883 199.855 66.0554C212.158 63.0816 241.655 50.4431 242.248 32.6004C242.841 18.921 225.498 3.30872 211.862 4.9443C193.926 7.02594 187.404 32.8978 181.327 49.5509C180.586 38.994 178.362 15.7986 166.801 5.68774C151.385 -7.84294 132.857 4.9443 132.412 21.3001C131.819 41.0757 174.212 52.0786 160.872 75.8688C138.341 58.4722 111.809 48.9562 94.7625 58.9183C87.4994 63.5277 79.1987 72.449 70.6016 84.0467C83.7937 98.0235 102.026 114.825 116.404 124.49C119.368 126.572 120.258 130.735 118.034 133.709C115.959 136.831 111.809 137.575 108.844 135.493C94.1696 125.531 76.2342 109.026 62.8938 95.1984C56.2236 105.161 49.4052 116.461 43.0314 128.356C55.6307 141.143 71.6392 155.566 84.3867 164.19C87.3512 166.272 88.0923 170.435 86.0172 173.409C83.942 176.531 79.7916 177.275 76.6789 175.193C64.0796 166.569 49.1087 153.187 36.5095 140.697C10.2733 192.59 -8.99612 251.173 4.34427 263.068Z" fill="#C69761" fill-opacity="0.4" />
                    </svg>
                </div>
                <?php if ($logo_custom) : ?>
                    <a href="<?php echo get_home_url(); ?>" class="logo">
                        <?php if ($logo_custom['mime_type'] == 'image/svg+xml') : ?>
                            <?php echo file_get_contents($logo_custom['url']); ?>
                        <?php else : ?>
                            <?php echo wp_get_attachment_image($logo_custom['id'], 'logo', false, array('class' => 'img-fluid')); ?>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
                <h1><?php echo $sous_titre; ?></h1>
                <div id="inputRecette">
                    <input type="text" placeholder="Chercher une recette" name="keyword" id="keyword" onkeyup="fetch()"></input>
                    <svg onkeyup="fetch()" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.0322 3.11731C11.7285 3.11731 7.43187 7.41601 7.43187 12.7173C7.42913 14.4638 7.90518 16.1776 8.80827 17.6724L4.15377 22.3269L4.16997 22.3431C3.67317 22.8186 3.36807 23.4936 3.36807 24.2565C3.36777 25.7304 4.54197 26.883 6.01437 26.8827C6.76647 26.8824 7.43907 26.5815 7.91907 26.0919L7.93077 26.1036L12.7332 21.3009C14.0672 21.9707 15.5395 22.3188 17.0322 22.3173C22.3362 22.3173 26.6319 18.0192 26.6319 12.7173C26.6319 7.41601 22.3359 3.11731 17.0322 3.11731ZM17.0904 18.5424C13.7754 18.5424 11.0901 15.8562 11.0901 12.5424C11.0901 9.22921 13.7754 6.54241 17.0904 6.54241C20.4054 6.54241 23.0901 9.22891 23.0901 12.5424C23.0904 15.8562 20.4054 18.5424 17.0904 18.5424Z" fill="#1A1717" />
                    </svg>
                </div>
                <div id="datafetch"></div>
            </div>
        </div>
    </div>
</section>

<section id="presentation" style="background-image:url('<?php echo $image_de_fond_accueil['url']; ?>')">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-12 col-lg-4">
                <h2 class="text-left"><?php echo $titre_section_presentation; ?> <br><span> <?php echo $titre_section_presentation_deux; ?></span></h2>
                <?php echo $texte_section_presentation; ?>

                <?php if ($lien_renvoi_decouvrir) : ?>
                    <?php
                    $args_btn = $lien_renvoi_decouvrir;
                    $args_btn['class'] = 'btn_stroke';
                    get_template_part('page/element', 'bouton', $args_btn);
                    ?>


                <?php endif; ?>


            </div>

            <div class="offset-lg-1 col-12 col-lg-5">
                <?php
                $args_img =  $image_presentation;
                get_template_part('page/element', 'image', $args_img);
                ?>

            </div>
        </div>
    </div>
</section>

<section id="dernieres_recettes">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Mes dernières recettes</h3>
            </div>
            <?php
            $args = array(
                'post_type' => 'recipes',
                'post_count' => '6',
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    echo get_template_part('parts/content', 'thumbnailRecipes');
                // content goes here
                endwhile;
                wp_reset_postdata();
            else :
            endif;

            ?>





        </div>
    </div>
</section>



<?php get_footer(); ?>