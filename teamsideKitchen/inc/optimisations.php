<?php

/*****************************************************************/
/*****************************************************************/
/******************* O P T I M I S A T I O N S *******************/
/*****************************************************************/
/*****************************************************************/

function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter('xmlrpc_enabled', '__return_false');
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
function disable_embed(){
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'disable_embed' );
function disable_pingback( &$links ) {
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, get_option( 'home' ) ) )
		unset($links[$l]);
}
add_action( 'pre_ping', 'disable_pingback' );
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
	    return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
add_filter('the_generator', 'wpm_delete_version');
function wpm_delete_version() {
	return '';
}
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

add_filter('jpeg_quality', function($arg){return 80;});

/**************************************************/
/**************** M I C R O  D A T A **************/
/*************************************************/

function add_menu_attributes( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_attributes', 10, 3 );



/**************************************************/
/* SUPPRESSION DU CATCHA SUR LES PAGES NON CONTACT */
/**************************************************/

function contactform_dequeue_scripts() {
    $load_scripts = false;
    if( is_page_template('contact.php') ) {
           $load_scripts = true;
      }
    if( ! $load_scripts ) {
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_script( 'google-recaptcha' );
        wp_dequeue_script( 'wpcf7-recaptcha' );     
        wp_dequeue_style( 'wpcf7-recaptcha' );
        wp_dequeue_style( 'contact-form-7' );
       }

}

add_action( 'wp_enqueue_scripts', 'contactform_dequeue_scripts', 99 );