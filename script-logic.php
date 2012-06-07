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
add_action ( 'admin_menu', 'ap_script_logic_add_page' );
function ap_script_logic_add_page() {
	$page = add_submenu_page('tools.php', 'Script Logic', 'Script Logic', 'administrator', 'script_logic', 'ap_script_logic_page');
	add_action('admin_print_scripts-' . $page, 'ap_script_logic_scripts');
}

function ap_script_logic_scripts() {
	wp_register_style( 'script-logic-css', plugin_dir_url(__FILE__) . 'css/script-logic.css', false, '1.0' );
	wp_enqueue_style( 'script-logic-css' );
	/* any styles and scripts that are needed on the admin page go here */
	wp_enqueue_script('jquery');
	/* twitter bootstrap stuff will go here */
}

function ap_script_logic_list_scripts() {
	$scripts = array(
		'scriptaculous' => array(
			'value' => 'scriptaculous',
			'name' => 'Scriptaculous',
			'level' => '0'
			),
		'scriptaculous-root' => array(
			'value' => 'scriptaculous-root',
			'name' => 'Scriptaculous Root',
			'level' => '1'
			),
		'scriptaculous-builder' => array(
			'value' => 'scriptaculous-builder',
			'name' => 'Scriptaculous Builder',
			'level' => '1'
			),
		'scriptaculous-dragdrop' => array(
			'value' => 'scriptaculous-dragdrop',
			'name' => 'Scriptaculous Drag & Drop',
			'level' => '1'
			),
		'scriptaculous-effects' => array(
			'value' => 'scriptaculous-effects',
			'name' => 'Scriptaculous Effects',
			'level' => '1'
			),
		'scriptaculous-slider' => array(
			'value' => 'scriptaculous-slider',
			'name' => 'Scriptaculous Slider',
			'level' => '1'
			),
		'scriptaculous-sound' => array(
			'value' => 'scriptaculous-sound',
			'name' => 'Scriptaculous Sound',
			'level' => '1'
			),
		'scriptaculous-controls' => array(
			'value' => 'scriptaculous-controls',
			'name' => 'Scriptaculous Controls',
			'level' => '1'
			),
		'jcrop' => array(
			'value' => 'jcrop',
			'name' => 'Jcrop',
			'level' => '0'
			),
		'swfobject' => array(
			'value' => 'swfobject',
			'name' => 'SWFObject',
			'level' = '0'
			),
		'swfupload' => array(
			'value' => 'swfupload',
			'name' => 'SWFUpload',
			'level' => '0'
			),
		'swfupload-degrade' => array(
			'value' => 'swfupload-degrade',
			'name' => 'SWFUpload Degrade',
			'value' => '0'
			),
		'swfupload-queue' => array(
			'value' => 'swfupload-queue',
			'name' => 'SWFUpload Queue',
			'level' => '0'
			),
		'swfupload-handlers' => array(
			'value' => 'swfupload-handlers',
			'name' => 'SWFUpload Handlers',
			'level' => '0'
			),
		'jquery' => array(
			'value' => 'jquery',
			'name' => 'jQuery',
			'level' => '0'
			),
		'jquery-form' => array(
			'value' => 'jquery-form',
			'name' => 'jQuery Form',
			'level' => '1'
			),
		'jquery-color' => array(
			'value' => 'jquery-color',
			'name' => 'jQuery Color',
			'level' => '1'
			),
		'jquery-ui-core' => array(
			'value' => 'jquery-ui-core',
			'name' => 'jQuery UI Core',
			'level' => '1'
			),
		'jquery-ui-widget' => array(
			'value' => 'jquery-ui-widget',
			'name' => 'jQuery UI Widget',
			'level' => '2'
			),
		'jquery-ui-mouse' => array(
			'value' => 'jquery-ui-mouse',
			'name' => 'jQuery UI Mouse',
			'level' => '2'
			),
		'jquery-ui-accordion' => array(
			'value' => 'jquery-ui-accordion',
			'name' => 'jQuery UI Accordion',
			'level' => '2'
			),
		'jquery-ui-slider' => array(
			'value' => 'jquery-ui-slider',
			'name' => 'jQuery UI Slider',
			'level' => '2'
			),
		'jquery-ui-tabs' => array(
			'value' => 'jquery-ui-tabs',
			'name' => 'jQuery UI Tabs',
			'level' => '2'
			),
		'jquery-ui-sortable' => array(
			'value' => 'jquery-ui-sortable',
			'name' => 'jQuery UI Sortable',
			'level' => '2'
			),
		'jquery-ui-draggable' => array(
			'value' => 'jquery-ui-draggable',
			'name' => 'jQuery UI Draggable',
			'level' => '2'
			),
		'jquery-ui-droppable' => array(
			'value' => 'jquery-ui-droppable',
			'name' => 'jQuery UI Droppable',
			'level' => '2'
			),
		'jquery-ui-selectable' => array(
			'value' => 'jquery-ui-selectable',
			'name' => 'jQuery UI Selectable',
			'level' => '2'
			),
		'jquery-ui-datepicker' => array(
			'value' => 'jquery-ui-datepicker',
			'name' => 'jQuery UI Datepicker',
			'level' => '2'
			),
		'jquery-ui-resizable' => array(
			'value' => 'jquery-ui-resizable',
			'name' => 'jQuery UI Resizable',
			'level' => '2'
			),
		'jquery-ui-dialog' => array(
			'value' => 'jquery-ui-dialog',
			'name' => 'jQuery UI Dialog',
			'level' => '2'
			),
		'jquery-ui-button' => array(
			'value' => 'jquery-ui-button',
			'name' => 'jQuery UI Button',
			'level' = '2'
			),
		'schedule' => array(
			'value' => 'schedule',
			'name' => 'jQuery Schedule',
			'level' => '1'
			),
		'suggest' => array(
			'value' => 'suggest',
			'name' => 'jQuery Suggest',
			'level' => '1'
			),
		'jquery-hotkeys' => array(
			'value' => 'jquery-hotkeys',
			'name' => 'jQuery Hotkeys',
			'level' => '1'
			),
		'thickbox' => array(
			'value' => 'thickbox',
			'name' => 'ThickBox',
			'level' => '0'
			),
		'sack' => array(
			'value' => 'sack',
			'name' => 'Simple AJAX Code-Kit',
			'level' => '0'
			),
		'quicktags' => array(
			'value' => 'quicktags',
			'name' => 'QuickTags',
			'level' => '0'
			),
		'farbtastic' => array(
			'value' => 'farbtastic',
			'name' => 'Farbtastic (color picker)',
			'level' => '0'
			),
		'tiny_mce' => array(
			'value' => 'tiny_mce',
			'name' => 'Tiny MCE',
			'level' => '0'
			),
		'prototype' => array(
			'value' => 'prototype',
			'name' => 'Prototype Framework',
			'level' => '0'
			),
		'autosave' => array(
			'value' => 'autosave',
			'name' => 'Autosave',
			'level' => '0'
			),
		'wp-ajax-response' => array(
			'value' => 'wp-ajax-response',
			'name' => 'WordPress AJAX Response',
			'level' => '0'
			),
		'wp-lists' => array(
			'value' => 'wp-lists',
			'name' => 'List Manipulation',
			'level' => '0'
			),
		'common' => array(
			'value' => 'common',
			'name' => 'WP Common',
			'level' => '0'
			),
		'editor' => array(
			'value' => 'editor',
			'name' => 'WP Editor',
			'level' => '0'
			),
		'editor-functions' => array(
			'value' => 'editor-functions',
			'name' => 'WP Editor Functions',
			'level' => '0'
			),
		'ajaxcat' => array(
			'value' => 'ajaxcat',
			'name' => 'AJAX Cat',
			'level' => '0'
			),
		'admin-categories' => array(
			'value' => 'admin-categories',
			'name' => 'Admin Categories',
			'level' => '0'
			),
		'admin-tags' => array(
			'value' => 'admin-tags',
			'name' => 'Admin Tags',
			'level' => '0'
			),
		'admin-custom-fields' => array(
			'value' => 'admin-custom-fields',
			'name' => 'Admin custom fields',
			'level' => '0'
			),
		'password-strength-meter' => array(
			'value' => 'password-strength-meter',
			'name' => 'Password Strength Meter',
			'level' => '0'
			),
		'admin-comments' => array(
			'value' => 'admin-comments',
			'name' => 'Admin Comments',
			'level' => '0'
			),
		'admin-users' => array(
			'value' => 'admin-users',
			'name' => 'Admin Users',
			'level' => '0'
			),
		'admin-forms' => array(
			'value' => 'admin-forms',
			'name' => 'Admin Forms',
			'level' => '0'
			),
		'xfn' => array(
			'value' => 'xfn',
			'name' => 'XFN',
			'level' => '0'
			),
		'upload' => array(
			'value' => 'upload',
			'name' => 'Upload',
			'level' => '0'
			),
		'postbox' => array(
			'value' => 'postbox',
			'name' => 'PostBox',
			'level' => '0'
			),
		'slug' => array(
			'value' => 'slug',
			'name' => 'Slug',
			'level' => '0'
			),
		'post' => array(
			'value' => 'post',
			'name' => 'Post',
			'level' => '0'
			),
		'page' => array(
			'value' => 'page',
			'name' => 'Page',
			'level' => '0'
			),
		'link' => array(
			'value' => 'link',
			'name' => 'Link',
			'level' => '0'
			),
		'comment' => array(
			'value' => 'comment',
			'name' => 'Comment',
			'level' => '0'
			),
		'comment-reply' => array(
			'value' => 'comment-reply',
			'name' => 'Threaded Comments',
			'level' => '0'
			),
		'admin-gallery' => array(
			'value' => 'admin-gallery',
			'name' => 'Admin Gallery',
			'level' => '0'
			),
		'media-upload' => array(
			'value' => 'media-upload',
			'name' => 'Media Upload',
			'level' => '0'
			),
		'admin-widgets' => array(
			'value' => 'admin-widgets',
			'name' => 'Admin widgets',
			'level' => '0'
			),
		'word-count' => array(
			'value' => 'word-count',
			'name' => 'Word Count',
			'level' => '0'
			),
		'theme-preview' => array(
			'value' => 'theme-preview',
			'name' => 'Theme Preview',
			'level' => '0'
			),
		'json2' => array(
			'value' => 'json2',
			'name' => 'JSON for JS',
			'level' => '0'
			)
		);
	return $scripts;
}


function ap_script_logic_page() {

	// HTML markup goes here ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {

				var nextUrlId = 2;
				var row = "				<div class=\"span12\">
					<select name=\"enqueue_or_dequeue\" id=\"enqueue_or_dequeue\">
						<option value=\"dequeue\"><?php _e( 'Dequeue', 'script-logic' ); ?></option>
						<option value=\"enqueue\"><?php _e( 'Enqueue', 'script-logic' ); ?></option>
					</select>
					<select name=\"script\" id=\"script\">
						<option class=\"level-0\" value=\"scriptaculous\"><?php _e( 'Scriptaculous', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-root\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Root', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-builder\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Builder', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-dragdrop\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Drag & Drop', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-effects\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Effects', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-slider\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Slider', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-sound\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Sound', 'script-logic' ); ?></option>
							<option class=\"level-1\" value=\"scriptaculous-controls\">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Controls', 'script-logic' ); ?></option>
					</select>
					<?php _e( 'on', 'script-logic' ); ?> <?php wp_dropdown_pages(); ?>
				</div>";
				$('#add-row').click(function(){

					//Create and add a paragraph

					$('form#script-logic').attr('id', 'row' + nextUrlId)

							  .text(row)

							  .appendTo('#row' + nextUrlId);


					//Iterate id number

					nextUrlId++;

				});

			});
		</script>

	<div class="wrap">
		<div id="icon-script-logic" class="icon32">
			<br />
		</div>
		<h2><?php _e( 'Script Logic', 'script-logic' ); ?></h2>
		<form id="script-logic" action="somePage.php" method="get">
			<div class="row-fluid" id="row">
				<div class="span12">
					<select name="enqueue_or_dequeue" id="enqueue_or_dequeue">
						<option value="dequeue"><?php _e( 'Dequeue', 'script-logic' ); ?></option>
						<option value="enqueue"><?php _e( 'Enqueue', 'script-logic' ); ?></option>
					</select>
					<select name="script" id="script">
						<option class="level-0" value="scriptaculous"><?php _e( 'Scriptaculous', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-root">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Root', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-builder">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Builder', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-dragdrop">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Drag & Drop', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-effects">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Effects', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-slider">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Slider', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-sound">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Sound', 'script-logic' ); ?></option>
							<option class="level-1" value="scriptaculous-controls">&nbsp;&nbsp;&nbsp;<?php _e( 'Scriptaculous Controls', 'script-logic' ); ?></option>
					</select>
					<?php _e( 'on', 'script-logic' ); ?> <?php wp_dropdown_pages(); ?>
				</div>

					<p id="nameParagraph">Name: <input type="text" id="name" /></p>

					<p id="urlParagraph1">URL: <input type="text" id="url1" /></p>

				</div>

				<p><input type="submit" id="submit" /> or <a href="#" id="add-row">Add another URL</a></p>
			</div>
		</form>
	</div>
<?php
}
?>