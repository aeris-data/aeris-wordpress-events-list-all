<?php 

function gewex_admin_load_script() {
	wp_enqueue_script ( 'markdown_showdown', plugin_dir_url (dirname (dirname(dirname(dirname(__FILE__ ))))) . '/assets/js/showdown.min.js' );
	wp_enqueue_script ( 'markdown_parser', plugin_dir_url (dirname (dirname(dirname(dirname(__FILE__ ))))) . '/assets/js/gewex_admin_md.js' );
}

add_action ( 'admin_enqueue_scripts', 'gewex_admin_load_script' );

global $markdown_content;
$markdown_content = file_get_contents ( dirname (dirname(dirname(dirname(__FILE__ )))) . '/readme.md') ;

?>
	<div class='content'>
		
		<?php
		
		echo $markdown_content;
		
		?>
		</div>
	<?php


?>