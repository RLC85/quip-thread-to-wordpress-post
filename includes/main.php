<?php

function quip_register_settings() {
	register_setting('quip-options','quip-access-token');
	register_setting('quip-options','quip-sync-folders');
	register_setting('quip-options','quip-home-folder');
}

function quip_create_main_menu() {
	add_menu_page( 'Settings', 'Quip to Wordpress', 'edit_posts', 'quip-to-wordpress', 'quip_show_settings');
}

add_action('admin_menu','quip_create_main_menu');

function quip_show_settings() {
	if(isset($_POST['quip-access-token'])) {
		update_option('quip-access-token',$_POST['quip-access-token']);
	}

	if(isset($_POST['quip-sync-folders'])) {
		update_option('quip-sync-folders',$_POST['quip-sync-folders']);
	}

	if(isset($_POST['quip-home-folder'])) {
		update_option('quip-home-folder',$_POST['quip-home-folder']);
	}
	$folder = json_decode(get_folder('YNAAOAYXjGs'));

	include(BASE_DIR.'templates/main.php');
}

function loop_children($children,$parent_title='') {
	$html = '';
	foreach($children as $child) {
		if(isset($child->folder_id)) {
			$folder = json_decode(get_folder($child->folder_id));
			$title  = $folder->folder->title;
			$html  .= "<li><h4>$parent_title/$title</h4><ul>";
			$html  .= loop_children($folder->children,$title);
			$html  .= '</ul></li>';
		} else if(isset($child->thread_id)) {
			$thread = json_decode(get_thread($child->thread_id));
			$title = $thread->thread->title;
			$html  .= "
<li>
	<span>$parent_title/$title</span>
</li>";
		}
	}
	return $html;
}