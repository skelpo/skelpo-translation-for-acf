<?php
/**
 * Plugin Name: ACF Translation Plugin
 * Description: Get ACF translations right inside your WordPress editor.
 * Version: 1.0.1
 * Plugin Slug: acftranslate
 * Author: Skelpo Inc. & morepixel GmbH
 * Author URI: https://www.skelpo.com/
 * Requires at least: 4.0.0
 * Tested up to: 6.2.2
 * Text Domain: acftranslate
 * Domain Path: /languages
 */
 
 
 $languagePairs = json_decode('{
   "supported_languages": [
	 {
	   "source_lang": "de",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "de",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "en",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "es",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "fr",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "ja",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "it",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "pl",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "nl",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "ru"
	 },
	 {
	   "source_lang": "zh",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "ru",
	   "target_lang": "pt"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "de"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "en"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "es"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "fr"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "ja"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "it"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "pl"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "nl"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "zh"
	 },
	 {
	   "source_lang": "pt",
	   "target_lang": "ru"
	 }
   ]
 }',true)["supported_languages"];
 
 function acft_install_plugin() {
	 if ( !get_option( 'acft_plugin_installed') ) {
		 update_option( 'acft_plugin_installed', 0 );
	 }
	 
	 update_option('acft_plugin_installed', 1 );
 }

 use Carbon_Fields\Container;
 use Carbon_Fields\Field;
 

 
 add_action( 'carbon_fields_register_fields', 'acft_attach_theme_options' );
 function acft_attach_theme_options() {
	 global $languagePairs;
	 $options = [];
	 foreach ($languagePairs as $pair) {
		 $options[$pair['source_lang']] = __($pair['source_lang']);
	 };
	 Container::make( 'theme_options', __( 'ACF Translate Settings' ) )
	 ->add_tab( __( 'Usage & License' ), array(
		 Field::make( 'text', 'acft_license', __( 'License Key' ) )
		 ->set_help_text( 'Automatically assigned - you can manually adjust it if needed.' )
		 ->set_classes( 'acft_license_field' ),
		 Field::make( 'select', 'acft_engine', __( 'Engine' ) )
		 ->set_help_text( 'Who should do the translating?' )
		 ->add_options( array(
			 //'google' => __( 'Google Translate (requires API-Key)' ),
			 'deepl' => __( 'DeepL (requires API-Key)' ),
			 'integrated' => __( 'We\'ll manage APIs for you. 😉' ),
		 ) ),
		 Field::make( 'select', 'acft_default_language', __( 'Default Language' ) )
		  ->set_help_text( 'What language will be be translating into the most?' )
		  ->add_options( $options )
		   ->set_classes( 'acft_default_language' ),
	 ) )
	 ->add_tab( __( 'DeepL' ), array(
		 Field::make( 'text', 'acft_deepl_api_key', __( 'API Key' ) ),
		 Field::make( 'select', 'acft_deepl_api_version', 'API Server' )
		 ->add_options( array(
			 'free' => 'Free API Plan (https://api-free.deepl.com)',
			 'paid' => 'Regular paid API Plan (https://api.deepl.com/v2/)',
		 ) )
	 ) )
	  ->add_tab( __( 'Google Translate' ), array(
		  Field::make( 'text', 'acft_google_key', __( 'API Key' ) ),
	  ) );
	 
 }
 
add_action( 'after_setup_theme', 'acft_load' );
add_action( 'wp_ajax_acft_save_license_key', 'acft_save_license_key' );
   
 function acft_save_license_key() {
  $key = $_POST['key'];
  carbon_set_theme_option("acft_license", $key);
  echo json_encode(array("success" => true));
  wp_die();
 }

 function acft_load() {
	 require_once( 'vendor/autoload.php' );
	 \Carbon_Fields\Carbon_Fields::boot();
 }

 defined( 'ACF_TRANSLATE_PATH' ) or define( 'ACF_TRANSLATE_PATH', 		realpath( __DIR__ ) );
 defined( 'ACF_TRANSLATE_URL' ) or define( 'ACF_TRANSLATE_URL', 		plugins_url( '', __FILE__ ) );

try {
	 if ( is_admin() ) {
 
		 
		  include_once  trailingslashit( ACF_TRANSLATE_PATH ) . 'admin/acftranslate-admin-hooks.php';
		  include_once  trailingslashit( ACF_TRANSLATE_PATH ) . 'admin/acftranslate-admin-functions.php';
		  include_once  trailingslashit( ACF_TRANSLATE_PATH ) . 'admin/acftranslate-metabox.php';
		  
 
	 }
 } catch ( Exception $e ) {
	 if ( current_user_can( 'manage_options' ) ) {
		 print_r( $e );
		 die( __( 'Error loading ACF translate','acftranslate' ) );
	 }
 }
