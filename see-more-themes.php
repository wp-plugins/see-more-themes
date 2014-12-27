<?php
/**
 * Plugin Name: See More Themes
 * Plugin URI: https://github.com/sdavis2702/see-more-themes
 * Description: When viewing installed themes or searching for new themes in your WordPress dashboard, See More Themes allows you to... see more themes... on the screen at once.
 * Version: 1.0.0
 * Author: Sean Davis
 * Author URI: http://seandavis.co
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 4.1
 * 
 * This plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see http://www.gnu.org/licenses/.
 */
if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly

class See_More_Themes
{
	public function __construct() {
		// load the CSS... I mean... that's what we're here for
		add_action( 'admin_enqueue_scripts', array( $this, 'see_more_themes_styles' ), 10, 2 );
	}

	// we only want the stylesheet if the Themes page is being loaded
	public function see_more_themes_styles( $hook ) {
		if ( 'themes.php' == $hook || 'theme-install.php' == $hook ) {
			wp_enqueue_style( 'see-more-themes-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/see-more-themes.css' );
		}
	}
}
new See_More_Themes();