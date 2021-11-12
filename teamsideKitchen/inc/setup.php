<?php

/*****************************************************************/
/*****************************************************************/
/*********************** F O N C T I O N S ***********************/
/*****************************************************************/
/*****************************************************************/

// Register Custom Post Type
function recipes()
{

	$labels = array(
		'name'                  => _x('Recettes', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('Recette', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Recettes', 'text_domain'),
		'name_admin_bar'        => __('Recette', 'text_domain'),
		'archives'              => __('Archive des recettes', 'text_domain'),
		'attributes'            => __('Item Attributes', 'text_domain'),
		'parent_item_colon'     => __('Parent Item:', 'text_domain'),
		'all_items'             => __('Toutes les recettes', 'text_domain'),
		'add_new_item'          => __('Ajouter une recette', 'text_domain'),
		'add_new'               => __('Ajouter', 'text_domain'),
		'new_item'              => __('Nouvelle recette', 'text_domain'),
		'edit_item'             => __('Editer une recette', 'text_domain'),
		'update_item'           => __('Mettre à jour une recette', 'text_domain'),
		'view_item'             => __('Voir la recette', 'text_domain'),
		'view_items'            => __('Voir les recettes', 'text_domain'),
		'search_items'          => __('Chercher une recette', 'text_domain'),
		'not_found'             => __('Non trouvé', 'text_domain'),
		'not_found_in_trash'    => __('Non trouvé dans la corbeille', 'text_domain'),
		'featured_image'        => __('Image à la une', 'text_domain'),
		'set_featured_image'    => __('Mettre une image à la une', 'text_domain'),
		'remove_featured_image' => __('Supprimer l\'image à la une', 'text_domain'),
		'use_featured_image'    => __('Utiliser comme image à la une', 'text_domain'),
		'insert_into_item'      => __('Insérer en tant que recette', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list'            => __('Liste des recettes', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list'     => __('Filtrer les recettes', 'text_domain'),
	);
	$args = array(
		'label'                 => __('Recette', 'text_domain'),
		'description'           => __('List of recipes', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('recipes', $args);
}
add_action('init', 'recipes', 0);

function crunchify_create_the_attaction_taxonomy()
{
	register_taxonomy(
		'ustensiles',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
		'recipes',        			//post type name
		array(
			'hierarchical' => true,
			'label' => 'Ustensiles',  	//Display name
			'query_var' => true,
			'has_archive' => false,

		)
	);
}
add_action('init', 'crunchify_create_the_attaction_taxonomy');


/* Ajout de page option pour ACF */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page();
}



/* Autorisation SVG */
function wp_theme_img_type($type)
{
	$type['svg'] = 'image/svg+xml';
	return $type;
}

add_filter('upload_mimes', 'wp_theme_img_type');

/* Désactivation Gutenberg */
add_filter('use_block_editor_for_post', '__return_false', 10);

/* Désactivation commentaires dashboard */

function df_disable_comments_admin_menu()
{
	remove_menu_page("edit-comments.php");
}
add_action("admin_menu", "df_disable_comments_admin_menu");

/*****************************************/
/*************** S E T U P ***************/
/****************************************/

function setup_wordpress()
{
	show_admin_bar(false);
	add_theme_support('post-thumbnails');
	//add_theme_support( 'woocommerce' );
	add_theme_support('title-tag');
	//add_theme_support( 'search-form' );
	add_image_size('slider', 1920, 1080, array('center', 'center'));
}
add_action('after_setup_theme', 'setup_wordpress');

function remove_menus()
{
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');

/**************************************************/
/***** L O G O  A D M I N  C O N N E X I O N *****/
/*************************************************/

function wpm_login_style()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_field('logo', 'option')['url']; ?>);
			width: 300px;
			height: 130px;
			background-size: 100%;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'wpm_login_style');





// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
?>
	<script type="text/javascript">
		function fetch() {

			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: {
					action: 'data_fetch',
					keyword: jQuery('#keyword').val()
				},
				success: function(data) {
					jQuery('#datafetch').html(data);
				}
			});

		}
	</script>

	<?php
}

// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{

	$the_query = new WP_Query(
		array(
			'post_type' => 'recipes',
			'posts_per_page' => 1,
			's' => esc_attr($_POST['keyword']),

		)
	);


	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post();

			$myquery = esc_attr($_POST['keyword']);
			$a = $myquery;
			$search = get_the_title();
			if (stripos("/{$search}/", $a) !== false) { ?>
				<div class="recherches">

					<a href="<?php echo esc_url(post_permalink()); ?>">
						<img src="<?php echo the_post_thumbnail_url() ?>" alt="">
						<div class="texte">
							<h4><?php the_title(); ?></h4>
							<ul>
								<li>
									<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.08 16.8H10.92V17.64H10.08V16.8Z" fill="black" />
										<path d="M3.36 10.08H4.2V10.92H3.36V10.08Z" fill="black" />
										<path d="M16.8 10.08H17.64V10.92H16.8V10.08Z" fill="black" />
										<path d="M17.9247 3.0754C16.143 1.28356 13.771 0.200076 11.2501 0.0265784V0H9.7501V4.50004H11.2501V1.53151C15.8631 1.91392 19.5001 5.79001 19.5001 10.5001C19.5001 15.4628 15.4627 19.5002 10.5001 19.5002C5.53749 19.5002 1.5001 15.4628 1.5001 10.5001C1.49907 9.31608 1.73215 8.14354 2.18593 7.04993C2.63971 5.95631 3.30524 4.96322 4.14423 4.12776L9.5641 10.9659L10.7396 10.0343L4.34073 1.96071L3.74982 2.45712C2.12927 3.81724 0.957397 5.6352 0.387756 7.67277C-0.181885 9.71033 -0.12272 11.8725 0.557498 13.8758C1.23772 15.8792 2.50726 17.6303 4.19976 18.8998C5.89226 20.1693 7.92878 20.8978 10.0424 20.99C12.1561 21.0822 14.2483 20.5337 16.0449 19.4165C17.8415 18.2992 19.2587 16.6652 20.1108 14.7287C20.9629 12.7922 21.2101 10.6434 20.82 8.56398C20.4299 6.48456 19.4208 4.57147 17.9248 3.0754H17.9247Z" fill="black" />
									</svg>
									<?php echo get_field('temps_total_de_preparation', get_the_ID()); ?>
								</li>
								<li>
									<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.4854 0C16.2845 0 21 4.71548 21 10.5146C21 16.3138 16.2845 21 10.4854 21C4.68619 21 0 16.3138 0 10.5146C0 4.71548 4.68619 0 10.4854 0ZM10.4854 19.9163C15.6695 19.9163 19.9163 15.6987 19.9163 10.5146C19.9163 5.33054 15.6695 1.08368 10.4854 1.08368C5.30126 1.08368 1.08368 5.33054 1.08368 10.5146C1.08368 15.6987 5.30126 19.9163 10.4854 19.9163ZM13.5314 5.79916C13.0628 4.6569 11.9205 3.77824 10.4561 3.77824C9.28452 3.77824 8.14226 4.56904 7.73222 5.30126C5.41841 4.24686 3.01674 6.12134 3.01674 8.31799C3.01674 9.841 3.92469 10.8661 5.21339 11.5105C5.06695 12.8285 4.83264 14.3515 4.68619 15.6402C4.62761 16.0795 4.51046 16.6067 4.80335 16.9582C5.53556 17.1339 6.32636 17.046 7.14644 17.046H14.2929C14.7908 16.8117 14.7029 16.1967 14.7615 15.7866C14.908 14.4686 15.113 13.0042 15.2887 11.7448C17.4268 11.8033 18.8912 10.3975 18.8912 8.40586C18.8912 5.79916 15.9623 4.10042 13.5314 5.79916ZM12.682 6.64854C12.682 6.91213 12.5063 6.97071 12.5063 7.17573C12.7699 7.35146 13.0921 7.58577 13.4435 7.70293C13.7364 6.82427 14.7322 6.03347 15.9331 6.20921C17.1046 6.35565 17.8661 7.55649 17.7782 8.69874C17.6904 9.66527 16.7824 10.6318 15.3766 10.6611C15.4644 10.0753 15.4937 9.46025 14.9372 9.43096C14.3515 9.43096 14.2929 10.3389 14.205 11.1297C14.0879 11.9791 14.0586 12.7992 13.9707 13.2971H8.17155C7.35146 13.2971 6.50209 13.1799 6.61925 14C6.70711 14.4686 7.46862 14.3808 8.17155 14.3808C9.98745 14.3808 12.1255 14.3222 13.8243 14.41C13.7657 14.9372 13.7071 15.4937 13.6192 15.9623H5.76987C6.00418 14.205 6.20921 12.3305 6.44351 10.5732C5.12552 10.5146 3.98326 9.51883 4.12971 8.0251C4.36402 6.00418 7.23431 5.4477 8.25941 7.08787C8.31799 5.9749 9.13808 5.00837 10.1632 4.89121C11.364 4.74477 12.3891 5.50628 12.682 6.64854Z" fill="black" />
									</svg>
									<?php echo get_field('difficulte', get_the_ID()); ?>
								</li>
							</ul>
						</div>
					</a>
				</div>
<?php
			}
		endwhile;
		wp_reset_postdata();
	endif;

	die();
}
