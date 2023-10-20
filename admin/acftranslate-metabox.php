<?php

class ACFTranslate_Metabox {
	protected $metabox_config = array();

	function __construct() {
		add_action( 'add_meta_boxes', array( &$this, 'add_meta_box' ) );
	}

	public function add_meta_box() {
		add_meta_box(
			'acft_metabox',
			__( 'ACF Translation', 'acft' ),
			array( &$this, 'output' ),
			null,
			'side',
			'high'
		);
	}
	private function getLanguageFromIsoCode2( $isocode2, $context = 'target' ) {
		$isocode2 = strtolower( $isocode2 );
		$all_languages = array("de" => "German", "en" => "English");
		$key = ( $context == 'source' ) ? 'assource' : 'astarget';
		foreach( $all_languages as $lang => $language ) {
			$short = substr( strtolower( $language[$key] ), 0, 2 );
			if( $short == $isocode2 ) {
				return $lang;
			}
		}
		return false;
	}
	public function output() {

		global $post;


		$default_behaviour = 'replace';
		$default_metabox_behaviours = array('replace'		=> __( 'Replace content', 'acftranslate' ),
		'append'		=> __( 'Append to content', 'acftranslate' ));

		
		if ( !$default_behaviour ) {
			$default_behaviour = 'replace';
		}

		global $pagenow;
		
		if( $pagenow == 'post-new.php' ) {
			_e('Please save or publish the post first', 'acftranslate' );
			return;

		}
		$target_lang = carbon_get_theme_option("acft_default_language"); // get_option( 'deepl_default_locale');
		
		


		$html = '
			' . acftranslate_language_selector( 'source', 'acft_source_lang', false ) . '
			<br />' . __( 'Translating to', 'wpdeepl' ) . '<br />
			' . acftranslate_language_selector( 'target', 'acft_target_lang', $target_lang ) . '
			<span id="acft_error" class="error" style="display: none;"></span>
			<a id="acft_translate_do" onclick="acft_translate(); return false;" href="javascript:;" class="button button-primary button-large">' . __( 'Translate' , 'acftranslate' ) . '</a>
			<hr />';


		foreach ( $default_metabox_behaviours as $value => $label ) {
			$html.= '
			<span style="display: block;">
				<input type="radio"  name="acft_replace" value="'. $value .'"';

			if ( $value == $default_behaviour ) {
				$html .= ' checked="checked"';
			}

			$html .= '>
				<label for="acft_replace">' . $label . '</label>
			</span>';
		}
	
		$html .= "<span id=\"acft_usage\"></span><script>
var acft_license_code = '".carbon_get_theme_option("acft_license")."';
const acft_save_license_url = '".get_rest_url(null, "acftranslate/v1/licenseKey")."';
const acft_deepl_api_key = '".carbon_get_theme_option("acft_deepl_api_key")."';
const acft_deepl_api_version = '".carbon_get_theme_option("acft_deepl_api_version")."';
const acft_google_key = '".carbon_get_theme_option("acft_google_key")."';
const acft_default_language = '".carbon_get_theme_option("acft_default_language")."';
const acft_engine = '".carbon_get_theme_option("acft_engine")."';
</script>";

		echo ( $html);
	}
}
