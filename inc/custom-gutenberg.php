<?php
/**
 * Custom gutenberg related functions
 *
 * @package lealue
 * @since 1.0.0
 */

function lealue_gutenberg_scripts() {

	// ENQUEUE GUTENBERG RELATED SCRIPTS
	wp_enqueue_script(
		'lealue-gutenberg', 
		get_stylesheet_directory_uri() . '/js/gutenberg.min.js', 
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-editor', 'wp-i18n' ), 
		filemtime( get_stylesheet_directory() . '/js/gutenberg.min.js' ),
		true
	);
  
}
add_action( 'enqueue_block_editor_assets', 'lealue_gutenberg_scripts' );