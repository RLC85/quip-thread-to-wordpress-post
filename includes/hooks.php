<?php

function quip_add_folder_after_category() {
	die('Category Created');
}

add_action('create_category','quip_add_folder_after_created');

function quip_update_folder_after_category() {

}

add_action('edit_category','quip_update_folder_after_category');