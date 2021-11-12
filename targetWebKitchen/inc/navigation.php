<?php
/*****************************************/
/************** M E N U S ***************/
/****************************************/

function wp_theme_nav() {
	register_nav_menus( array(
		'menu_principal' => 'Menu principal',
    ) );
    register_nav_menus( array(
		'footer_col_1' => 'Footer colonne 1',
    ) );
}
add_action( 'init', 'wp_theme_nav' );