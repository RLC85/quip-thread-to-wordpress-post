<?php

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
	$url = 'https://platform.quip.com/1/folders/'.$thread_id;
	$ch  = curl_init($url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
	if( ! $result = curl_exec($ch)) { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch); 
    return $result;
}