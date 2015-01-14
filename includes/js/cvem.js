jQuery(document).ready(function(){
					jQuery('.cvem_delete').click(function(){
						var confirm_delete = confirm('Delete this variable?');
						if (confirm_delete) {
							jQuery(this).parent().parent().remove();
							jQuery('#cvem_options').submit();
							
						}
					});
					
					jQuery('.cvem_vname').blur(function(){
						jQuery(this).val(convertToSlug(jQuery(this).val()));
						});
					
					function convertToSlug(Text)
					{
						return Text
							.toLowerCase()
							.replace(/[^\w ]+/g,'')
							.replace(/ +/g,'_')
							;
					}

				});