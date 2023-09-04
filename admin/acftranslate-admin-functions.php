<?php



function acftranslate_language_selector(
	$type = 'target',
	$css_id = 'acft_language_selector',
	$selected = false
	) {
		global $languagePairs;
		$languages = [];
		foreach ($languagePairs as $pair) {
			if (in_array($pair['source_lang'], array_keys($languages)) == false) {
				$languages[$pair["source_lang"]] = $pair["source_lang"];
			}
		}
		

	$wp_locale = get_locale();

	$default_target_language = "en";

	if ( $type == 'target' && $selected == false ) {
		$selected = $default_target_language;
		//plouf( $languages );
	}

	$html = '';

	$html .= "\n" . '<select id="' . $css_id . '" name="' . $css_id . '" class="acft_translate_form">';

	if ( $type == 'source' ) $html .= '
	<option value="auto">' . __( 'Automatic', 'acftranslate' ) . '</option>';

	$languages_to_display = [];
	foreach ($languagePairs as $pair) {
			$languages_to_display[] = $pair['source_lang'];
	}
//	$languages_to_display = ["de", "en"];

	foreach ( $languages as $ln_id => $language ) {

		if ( $languages_to_display && !in_array( $ln_id, $languages_to_display ) ) {
			continue;
		}
		if (
			$default_target_language
			&& $ln_id == $default_target_language
			&& $type == 'source'
		) {
			//continue;
		}

		$html .= '
		<option value="' . $ln_id .'"';

		if ( $ln_id == $selected ) {
			$html .= ' selected="selected"';
		}
		$label = $language;
		$html .= '>' . $label. '</option>';
	}
	if ( $type == 'target' ) $html .= '
	<option value="notranslation">' . __( 'Dont\'t translate', 'acftranslate' ) . '</option>';

	$html .="\n</select>";
	

	return $html;
}
