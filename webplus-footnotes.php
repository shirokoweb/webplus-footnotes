<?php
/**
 * Plugin Name: WebPlus FootNotes
 * Plugin URI: https://webplus.agency
 * Description: This plugin adds footnotes to articles.
 * Version: 4.0.0
 * Author: Jacques Mojsilovic
 * Author URI: https://webplus.agency
 * License: GPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: webplus-footnotes
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load plugin text domain.
 */
function wpf_load_textdomain() {
	load_plugin_textdomain( 'webplus-footnotes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'wpf_load_textdomain' );

/**
 * Add footnotes to the content.
 *
 * @param string $content The content of the post.
 * @return string $content The content of the post with added footnotes.
 */
function wpf_add_footnotes( $content ) {
	$matches = array();
	if ( preg_match_all( '/\(\((.*?)\s?ref:(.*?)\)\)/', $content, $matches, PREG_SET_ORDER ) > 0 ) {
		$footnotes = '';
		$count = 1;

		foreach ( $matches as $match ) {
			$citation = sanitize_text_field( $match[1] );
			$url = esc_url_raw( $match[2] );

			$citation_link = '<a id="citation-' . $count . '" href="#footnote-' . $count . '"><sup>[' . $count . ']</sup></a>';
			$footnote_link = '<li id="footnote-' . $count . '"><a href="#citation-' . $count . '">^</a> <a href="' . $url . '">' . $citation . '</a></li>';

			$content = str_replace( $match[0], $citation_link, $content );
			$footnotes .= $footnote_link;

			$count++;
		}

		$footnotes = '<hr><h3>' . esc_html__( 'References', 'webplus-footnotes' ) . '</h3><ol>' . $footnotes . '</ol>';
		$content .= '<div class="footnotes">' . $footnotes . '</div>';
	}

	return $content;
}
add_filter( 'the_content', 'wpf_add_footnotes' );