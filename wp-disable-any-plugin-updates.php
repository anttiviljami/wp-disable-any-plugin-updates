<?php
/**
 * Plugin name: WP Disable Any Plugin Updates
 * Plugin URI: https://github.com/anttiviljami/wp-disable-any-plugin-updates
 * Description: Disables updates for a list of plugins permanently without editing them
 * Version: 1.0
 * Author: @anttiviljami
 * Author URI: https://github.com/anttiviljami
 * License: GPLv3
 */

/** Copyright 2017 Antti Kuosmanen
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 3, as
  published by the Free Software Foundation.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists('Disable_Any_Plugin_Updates') ) :

class Disable_Any_Plugin_Updates {
  public static $instance;

  public static function init() {
    if ( is_null( self::$instance ) ) {
      self::$instance = new Disable_Any_Plugin_Updates();
    }
    return self::$instance;
  }

  private function __construct() {
    add_filter( 'site_transient_update_plugins', array( $this, 'filter_plugin_updates' ) );
  }

  public function filter_plugin_updates( $value ) {
    $disabled_plugins = defined('PLUGINS_DISABLED_FOR_UPDATE') ? unserialize( PLUGINS_DISABLED_FOR_UPDATE ) : array();
    foreach($disabled_plugins as $plugin) {
      unset( $value->response[$plugin] );
    }
    return $value;
  }
}
endif;

// init the plugin
Disable_Any_Plugin_Updates::init();

