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
	include('functions.php');
	$folder = get_folder('YNAAOAYXjGs');
	var_dump($folder);
	include(BASE_DIR.'templates/main.php');
}

function quip_get_folders() {

}