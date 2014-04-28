<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Quip to Wordpress
Plugin URI: 
Description: Adds functions that will keep your Quip threads and Wordpress Posts in sync and allow importing and exporting of Posts and Threads
Version: 1.0.0
Author: Richard Christensen
Author URI: http://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: Quip
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define(BASE_DIR,plugin_dir_path(__FILE__));

include('includes/main.php');
include('includes/quip_import.php');
include('includes/sync.php');
include('includes/hooks.php');

