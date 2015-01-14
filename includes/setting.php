<?php
function cvem_option_page(){
	global $cvem_options;
	ob_start();	
?>

    <div class="wrap">
        <h1><?php echo CVEM_PLUGIN_NAME; ?></h1>
            <form method="post" id="cvem_options" action="options.php">
            <?php settings_fields('cvem_settings_group');
                  //do_settings_sections( 'cvem_settings_group' );
                 ?>
            <table class="widefat">
            	<thead>
                <tr>
                    <th><?php _e('Variable Name','cvem_domain');  ?></th>
                    <th><?php _e('Variable Value','cvem_domain');  ?></th>
                    <th><?php _e('Shortcodes','cvem_domain');  ?></th>
                    <th><?php _e('Delete','cvem_domain');  ?></th>
                </tr>
                </thead>
                <tbody>
                <?php echo display_records(); ?>
                <tr>
                    <td><input type="text" class="cvem_vname" name="cvem_settings[vname][]" value=""  /></td>
                    <td><input type="text" name="cvem_settings[vvalue][]" value="" /></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th><?php _e('Variable Name','cvem_domain');  ?></th>
                    <th><?php _e('Variable Value','cvem_domain');  ?></th>
                    <th><?php _e('Shortcodes','cvem_domain');  ?></th>
                    <th><?php _e('Delete','cvem_domain');  ?></th>
                </tr>
                </tfoot>
            </table>
            
            
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Options','cvem_domain');  ?>" />
            </p>
        </form>
        <p>Tips : You can copy the shortcode and paste into your post or page. If you want to use it in your template .php file, plsease use "echo do_shortcode(shortcode)".</p>
    </div>
    

<?php	
	echo ob_get_clean();

}

add_action('admin_menu','cvem_add_options_link');
function cvem_add_options_link(){
	add_options_page('Custom Variables', 'Custom Variables','manage_options','cvem_options', 'cvem_option_page');	
}

function cvem_register_settings(){
	register_setting('cvem_settings_group','cvem_settings');		
}
add_action('admin_init','cvem_register_settings');



function display_records() {
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
					$output .= '
					
					<tr>
						<td><input type="text" class="cvem_vname" name="cvem_settings[vname][]" value="'.$name.'" /></td>
						<td><input type="text" name="cvem_settings[vvalue][]" value="'.$value.'" /></td>
						<td><input type="text" name="" id="" readonly="readonly" value="[cvem_cv name=\''.$name.'\']" /></td>
                		<td><a class="cvem_delete">Delete</a></td>
					</tr>
					
					';
				}
			} // end if
			return $output;
		}



?>