<?php
// Add Shortcode
function custom_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
		), $atts, 'cvem_cv' )
	);
	global $cvem_options;
	$records = array();			
	$output = '';
	
	for($i = 0; $i < count($cvem_options['vname']); ++$i) {
		$name = trim($cvem_options['vname'][$i]);
		$value = trim($cvem_options['vvalue'][$i]);
		if($name!=''&&$value!=''){
			$records[$name] = $value;
		}
	}
	if (!empty($records)) { 
		foreach ($records as $name => $value) {
			if($atts['name']==$name){
				return $value;
			}
		}
	}
	
}
add_shortcode( 'cvem_cv', 'custom_shortcode' );

?>