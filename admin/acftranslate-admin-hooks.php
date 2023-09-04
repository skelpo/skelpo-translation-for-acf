<?php

add_action( 'init', 'acftranslate_init_admin', 40 );
function acftranslate_init_admin() {
	if ( !is_admin() ) {
		return;
	}

	if ( get_option( 'acft_plugin_installed' ) === false ) {
 		acft_install_plugin();
 	}

	global $ACFT_Metabox;
	$ACFT_Metabox = new ACFTranslate_Metabox();
}


add_action( 'admin_enqueue_scripts', 'acft_load_admin_javascript' );
function acft_load_admin_javascript( $hook ) {
	if ($hook == "toplevel_page_crb_carbon_fields_container_acf_translate_settings") {
		wp_enqueue_script( 'acft_admin_settings', trailingslashit( ACF_TRANSLATE_URL ) . 'assets/settings.js' );
	}
	else {
		wp_enqueue_script( 'acft_admin', trailingslashit( ACF_TRANSLATE_URL ) . 'assets/translate.js' );
			
	}
}


