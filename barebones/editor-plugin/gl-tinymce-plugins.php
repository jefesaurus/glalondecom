<?php
add_shortcode( 'fixed-aspect-ratio', 'fixed_aspect_ratio' );
function fixed_aspect_ratio( $atts, $content = "") {
	extract( shortcode_atts( array(
    'aspectratio' => '1.0'
	), $atts ) );
  $paddingamount = floatval($aspectratio)*100;

  $html = "<p><div style='position: relative; width: 100%;'>";
  $html .= sprintf("<div style='padding-bottom: %f%%;'></div>", $paddingamount);
  $html .= "<div style='position: absolute; top: 0; bottom: 0; left: 0; right: 0;'>";
  $html .= $content;
  $html .= "</div></div></p>";

	return $html;
}


add_action( 'init', 'gl_buttons' );
function gl_buttons() {
	add_filter("mce_external_plugins", "gl_add_buttons");
  add_filter('mce_buttons', 'gl_register_buttons');
}	
function gl_add_buttons($plugin_array) {
	$plugin_array['glplugins'] = get_template_directory_uri() . '/editor-plugin/gl-tinymce-plugins.js';
	return $plugin_array;
}
function gl_register_buttons($buttons) {
	array_push( $buttons, 'makeaspectratiobox', 'embedyoutube');
	return $buttons;
}
?>
