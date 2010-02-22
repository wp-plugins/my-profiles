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
$my_post = array(
  'comment_status' => 'closed', // 'closed' means no comments.
  'ping_status' => 'closed', // 'closed' means pingbacks or trackbacks turned off
   'post_author' => 1, //The user ID number of the author.
  'post_content' => '[show_myprofiles]', //The full text of the post.
   'post_excerpt' => 'page to display profiles', //For all your post excerpt needs.
  'post_name' => 'profiles', // The name (slug) for your post
  'post_status' =>'draft', //Set the status of the new post. 
  'post_title' => 'My Profiles', //The title of your post.
  'post_type' => 'page' //Sometimes you want to post a page.
 );  

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

// this is the initialization phase
function myprofile_init()
{
	global $myprofiles;
	register_sidebar_widget(__('My Profiles'), 'widget_myprofiles');
	register_widget_control('My Profiles', 'widget_myprofiles_control');
	wp_enqueue_script("jquery");
//	echo "Page created : " . wp_insert_post( $my_post );
}
//admin interface  goes here
function myprofile_admin()
{
	add_options_page('My profiles', 'My profiles', 8, 'myprofiles', 'myprofiles_options_admin');
//	echo "Page created : " . wp_insert_post( $my_post );
}
function myprofiles_head() 
{
	global $myprofiles_path;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $myprofiles_path . 'myprofiles.css" />'."\n";
}
function my_profiles_parameter($vars) {
    $vars[] = 'myprofile';
    return $vars;
}
function myprofies_trigger_check() {
	if(get_query_var('myprofile') == 'js') 
	{
		header('Content-type: application/x-javascript');
		myprofiles_js();
		exit;
	}
}
function myprofiles_flush_rewrite_rules() 
{
   global $wp_rewrite;
   $wp_rewrite->flush_rules();
}
function myprofiles_add_rewrite_rules( $wp_rewrite ) 
{
  $new_rules = array( 
     'myprofile/(.+)' => 'index.php?myprofile=' .
       $wp_rewrite->preg_index(1) );
/*
            $wp_rewrite->add_rewrite_tag('%pagename%', '(login)', 'pagename=');
            $rules = array_merge($rules, $wp_rewrite->generate_rewrite_rules($wp_rewrite->get_page_permastruct(), EP_PAGES));
            return $rules;

*/
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
/*
ShortCode added to enable listing of profile data within post or page if needed
*/
add_shortcode('my-profiles', 'show_myprofiles');
// HOOKS DONE HERE
add_action('plugins_loaded', 'myprofile_init');
add_action('admin_menu', 'myprofile_admin');
add_action('wp_head', 'myprofiles_head');
// this is how we mark a query string here namely "myprofile" if this is equals to "js"
// then we will be presenting the output as javascript.
add_filter('query_vars','my_profiles_parameter');
add_action('template_redirect', 'myprofies_trigger_check');
// permalink generation code for widget.
//  flush existing wp rewrites
add_action('init', 'myprofiles_flush_rewrite_rules');
add_action('generate_rewrite_rules', 'myprofiles_add_rewrite_rules');
?>