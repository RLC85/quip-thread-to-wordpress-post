<?php

function quip_add_folder_after_category($category_id) {
	global $wpdb;
	
	$category_meta = $wpdb->prefix . 'quip_categorymeta';
	$category      = get_category($category_id);

	if(!empty($category->parent) && $category->parent !== 0) {
		$parent_id = $category->parent;
		$parent_folder = $wpdb->get_row("SELECT * FROM $category_meta WHERE category_id = $parent_id AND meta_key ='quip_id'");
	} else {
		$parent_folder = null;
	}
	
	if(!empty($parent_folder)) {
		$parent_quip_id = $parent_folder->meta_value;
	} else {
		$parent_quip_id = get_option('quip-home-folder');
	}
	
	$response = json_decode(create_folder($category->slug,$parent_quip_id));
	
	if( !isset($response->error)) {
		$wpdb->insert($category_meta,array(
			'category_id' => $category_id, 
			'meta_key'    => 'quip_id',
			'meta_value'  => $response->folder->id
		));
	}
}

add_action('create_category','quip_add_folder_after_category');

function quip_update_folder_after_category() {
	
}

add_action('edit_category','quip_update_folder_after_category');

function quip_delete_folder_after_category($category_id) {
	
}

function add_quip_import_button_form() {
	include(BASE_DIR.'templates/import_quip_folder.php');
}

add_action('add_category_form_pre','add_quip_import_button_form');