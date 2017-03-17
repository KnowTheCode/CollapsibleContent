<?php
/**
 * Collapsible Content plugin
 *
 * @package         KnowTheCode\CollapsibleContent
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     Collapsible Content
 * Plugin URI:      _
 * Description:     Collapsible Content is a WordPress Plugin that shows and hides hidden content.  Practical examples include Q&As, FAQs, hints, marketing teasers, and more.  Click the icon to open and reveal the content. Click again to close and hide it.
 * Version:         1.3.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     collapsible_content
 * Requires WP:     4.7
 * Requires PHP:    5.5
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
namespace KnowTheCode\CollapsibleContent;

if ( ! defined( 'ABSPATH' ) ) {
	die( "Oh, silly, there's nothing to see here." );
}

define( 'COLLAPSIBLE_CONTENT_PLUGIN', __FILE__ );
define( 'COLLAPSIBLE_CONTENT_DIR', trailingslashit( __DIR__ ) );
define( 'COLLAPSIBLE_CONTENT_CONFIG_DIR', COLLAPSIBLE_CONTENT_DIR . 'config/' );

$plugin_url = plugin_dir_url( __FILE__ );
if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'COLLAPSIBLE_CONTENT_URL', $plugin_url );
define( 'COLLAPSIBLE_CONTENT_TEXT_DOMAIN', 'collapsible_content' );

require( __DIR__ . '/src/plugin.php' );