<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'required_plugins_register_required_plugins' );

function required_plugins_register_required_plugins() {
    
	$plugins = array(
		array(
			'name'               => 'Advanced custom fields pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source. 
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.10.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		array(
		 'name' => 'WebP Converter for Media', 
		 'slug' => 'webp-converter-for-media', 
		 'required' => false,
		),	
		array(
		 'name' => 'Favicon par RealFaviconGenerator', 
		 'slug' => 'favicon-by-realfavicongenerator',
		 'required' => false,
		),
	
		
	);

	$theme_text_domain = 'targetweb';

	$config = array(
		'domain' => $theme_text_domain,
		'default_path' => '', 
		'menu' => 'install-my-theme-plugins',
		'strings' => array(
			'page_title' => __( 'Installer les plugins recommandés', $theme_text_domain ),
			'menu_title' => __( 'Installation des Plugins', $theme_text_domain ), // 
			'instructions_install' => __( 'Le plugin %1$s est recommandé pour ce thème. Cliquer sur le boutton pour installer et activer %1$s.', $theme_text_domain ),
			'instructions_activate' => __( 'Le plugin %1$s est installé mais inactif. Aller à <a href="%2$s">la page d\'administration</a> pour son activation.', $theme_text_domain ), 
			'button' => __( 'Installer %s maintenant', $theme_text_domain ),
			'installing' => __( 'Installation du Plugin: %s', $theme_text_domain ), 
			'oops' => __( 'Une erreur s est produite.', $theme_text_domain ), // 
			'notice_can_install' => __( 'Ce thème recommande le plugin %1$s. <a href="%2$s"><strong>Cliquer ici pour commencer son installation</strong></a>.', $theme_text_domain ), 
			'notice_cannot_install' => __( 'Désolé, vous ne détenez pas les permissions necessaires pour installer le plugin %1$s.', $theme_text_domain ),
			'notice_can_activate' => __( 'Ce thème necessite le plugin %1$s. Actuellement inactif, vous devez vous rendre sur <a href="%2$s">la page d\'administration du plugin</a> pour l activer.', $theme_text_domain ), 
			'notice_cannot_activate' => __( 'Désolé, vous ne détenez pas les permissions necessaires pour activer le plugin %1$s.', $theme_text_domain ),
			'return' => __( 'Retour à l\'installeur de plugins', $theme_text_domain ),
		),
	);

	tgmpa( $plugins, $config );
}