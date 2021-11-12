<div class="col-12 col-lg-4">
    <a href="<?php the_permalink(); ?>">


        <div class="thumbnail-recettes">
            <div class="type-de-recette">
                <?php $img_cat = get_field('image_type_de_plat', 'category_' . get_the_category()[0]->term_id); ?>

                <?php if ($img_cat) : ?>

                    <?php if ($img_cat['mime_type'] == 'image/svg+xml') : ?>
                        <?php echo file_get_contents($img_cat['url']); ?>
                    <?php else : ?>
                        <?php echo wp_get_attachment_image($img_cat['id'], 'logo', false, array('class' => 'img-fluid')); ?>
                    <?php endif; ?>

                <?php endif; ?>


                <p><?php echo get_the_category()[0]->name; ?></p>
            </div>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            <div id="texte">
                <h4><?php echo the_title(); ?></h4>
                <ul>
                    <li>
                    <?php echo file_get_contents(get_template_directory() . '/images/preparation.svg'); ?>
                        <?php echo get_field('temps_total_de_preparation', get_the_ID()); ?>
                    </li>
                    <li>
                    <?php echo file_get_contents(get_template_directory() . '/images/difficulte.svg'); ?>
                        <?php echo get_field('difficulte', get_the_ID()); ?>
                    </li>
                </ul>


            </div>
        </div>
    </a>


</div>