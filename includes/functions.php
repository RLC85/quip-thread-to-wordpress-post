<?php

/**
 * get_folder
 * 
 * retrives a folder by it's id
 *
 * @author Richard Christensen <richard.christensen@bigideas.com>
 * @param string $folder_id id of the folder that is to be retrived
 * @return JSON
 */
function get_folder($folder_id=null) {
	if($folder_id === null) {
		return false;
	}
	if(!get_option('quip-access-token')) {
		return false;
	}
	
	$access_token = get_option('quip-access-token');
	$url = 'https://platform.quip.com/1/folders/'.$folder_id;
	$ch  = curl_init($url);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
	
	$result = curl_exec($ch);    
    curl_close($ch); 
    return $result;
}

/**
 * get_folders
 * 
 * Retrieves a list of folders based on an array of folder id's that are passed to the function
 *
 * @author Richard Christensen <richard.christensen@bigideas.com>
 * @param array $folder_id_array array of ids to be retrieved
 * @return JSON
 */
function get_folders($folder_id_array = array()) {
	if(empty($folder_id_array)) {
		return false;
	}
	
	$folders = implode(',', $folder_id_array);
	$access_token = get_option('quip-access-token');
	$url = 'https://platform.quip.com/1/folders/?ids='.$folders;
	$ch  = curl_init($url);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
	
	if( ! $result = curl_exec($ch)) { 
        trigger_error(curl_error($ch)); 
    } 
   
    curl_close($ch); 
    
    return $result;

}

/**
 * create_folder
 * 
 * Creates a new folder with the title, parent_id and color passed to the function
 *
 * @author Richard Christensen <richard.christensen@bigideas.com>
 * @param string $title (required) the title of the new folder
 * @param string $parent_id (optional) the id of the folder the new folder is to become a child of
 * @param integer $color (optional) the color of the new folder
 * @return JSON
 */
function create_folder($title='',$parent_id=null,$color=null) {
	$count = 0;
	if( $title === '') {
		return false;
	}
	$count++;
	$fields = urlencode($title);
	if( !empty($parent_id)) {
		$fields .= '&' . urlencode($parent_id);
		$count++;
	}
	if(!empty($color)) {
		$fields .= '&' .urlencode($color);
		$count++;
	}

	$url          = 'https://platform.quip.com/1/folders/new';
	$ch           = curl_init($url);
	$access_token = get_option('quip-access-token');

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,        $url);
	curl_setopt($ch, CURLOPT_POST,       $count);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));

	if( ! $result = curl_exec($ch)) { 
        trigger_error(curl_error($ch)); 
    } 
    
    curl_close($ch); 
    
    return $result;
}

function get_thread($thread_id=null) {
	if($thread_id === null) {
		return false;
	}
	if(!get_option('quip-access-token')) {
		return false;
	}
	$access_token = get_option('quip-access-token');
	$url          = 'https://platform.quip.com/1/threads/'.$thread_id;
	$ch           = curl_init($url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
	
	if( ! $result = curl_exec($ch)) { 
        trigger_error(curl_error($ch)); 
    } 
    
    curl_close($ch); 
    
    return $result;
}

function get_threads($thread_id_array=array()) {
	if(empty($thread_id_array)) {
		return false;
	}
	$threads = implode(',', $thread_id_array);
	$access_token = get_option('quip-access-token');
	$url = 'https://platform.quip.com/1/folders/?ids='.$threads;
	$ch  = curl_init($url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
	
	if( ! $result = curl_exec($ch)) { 
        trigger_error(curl_error($ch)); 
    } 
    
    curl_close($ch); 
    
    return $result;
}