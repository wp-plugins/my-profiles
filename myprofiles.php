<?php
/*
Plugin Name: My profiles
Author URI: http://anantshri.info
Plugin URI: http://anantshri.info/index.php?page=wpprofiles
Version: v0.6
Author: Anant Shrivastava
Description: this plugin provides a sleek and easy way to list all your profiles and to let others connect with you. So activate and visit the <a href="options-general.php?page=myprofiles">Settings Page</a>.
*/
?>
<?php
/*  Copyright 2009  Anant Shrivastava  (email : anant.shrivastava@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
// Internationalization
/*
Help on persian transalation by Mostafa <mostafa.s1990@gmail.com>
*/
 load_plugin_textdomain('my-profiles','wp-content/plugins/my-profiles/i18n'); ?>
<?php
include ('myprofiles_global.php');
// Standard My profiles function
include_once ('myprofiles_func.php');
//Side bar function
include_once ('myprofiles_sidebar.php');
?>
<?php
 $myprofiles_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';
// my profiles options 
function myprofiles_options_admin()
{
include('myprofiles_admin.php');
}
// widget control options
function widget_myprofiles_control()
{
?>
<div style="text-align:left">
<?php _e('To edit the options for this widget', 'my-profiles'); ?>, 
<?php _e('please visit the', 'my-profiles'); ?> 
<a href="options-general.php?page=myprofiles">
<?php _e('my profiles Settings Page', 'my-profiles'); ?></a>.
To edit the options for this widget, please visit the <a href="options-general.php?page=myprofiles">my profiles Settings Page</a>.
</div>
<?php
}

// display widget code goes here
//show_myprofiles();
// this is the initialization phase
function myprofile_init()
{
global $myprofiles;
register_sidebar_widget(__('My Profiles'), 'widget_myprofiles');
register_widget_control('My Profiles', 'widget_myprofiles_control');
wp_enqueue_script("jquery");
}
//admin interface  goes here
function myprofile_admin()
{
	add_options_page('My profiles', 'My profiles', 8, 'myprofiles', 'myprofiles_options_admin');
}
// HOOKS DONE HERE
add_action('plugins_loaded', 'myprofile_init');
add_action('admin_menu', 'myprofile_admin');
add_action('wp_head', 'myprofiles_head');
function myprofiles_head() {
	global $myprofiles_path;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $myprofiles_path . 'myprofiles.css" />'."\n";
	}
?>