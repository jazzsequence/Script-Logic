<?php
/*
Plugin Name: Script Logic
Plugin URI: http://museumthemes.com/script-logic/
Description: Script Logic aims to accomplish with enqueued scripts what Widget Logic does for widgets: apply some basic php conditionals to restrict or enqueue scripts on specific pages, but not others without modifying your theme's code.
Version: 0.1
Author: jazzs3quence
Author URI: http://museumthemes.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
*/

/**
 * add page
 * @author Chris Reynolds
 * @since 0.1
 * @uses add_submenu_page
 * @uses add_action
 * @uses ap_script_logic_page
 * @uses ap_script_logic_scripts
 * this adds the submenu page under Tools
 */
function ap_script_logic_add_page() {
	$page = add_submenu_page('tools.php', 'Script Logic', 'Script Logic', 'administrator', 'ap_script_logic_page', 'ap_script_logic_page');
	add_action('admin_print_scripts-' . $page, 'ap_script_logic_scripts');
}

?>