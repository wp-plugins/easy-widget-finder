<?php
/*
 * Plugin Name:       Easy Widget Finder
 * Plugin URI:        http://wordpress.org/plugins/easy-widget-finder/
 * Description:       Plugin which helps you to find your widget easily in your WordPress Admin
 * Version:           1.0.1
 * Author:            Nilambar Sharma
 * Author URI:        http://www.nilambar.net
 * Text Domain:       easy-widget-finder
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 */
class Easy_Widget_Finder_Plugin {

  protected $plugin_slug = 'easy-widget-finder';

  protected $plugin_version = '1.0.1';

  private static $_this;

  function __construct() {
    self::$_this = $this;
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
    add_action( 'widgets_admin_page', array( $this, 'ewf_admin_form_content' ) );
  }

  static function this() {

    return self::$_this;

  }

  function enqueue_admin_scripts( $hook ) {
    if( $hook != 'widgets.php' ){
        return;
    }
    wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'css/admin.css', __FILE__ ), array(), $this->plugin_version );
    wp_enqueue_script( $this->plugin_slug . '-admin-script', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ), $this->plugin_version );
  }

  function ewf_admin_form_content(){
    echo '<div class="ewf-form-wrap">';
    echo '<input type="text" name="txt-ewf-search-widget" id="txt-ewf-search-widget" placeholder="Start typing to filter widget" class="regular-text code">';
    echo '</div>';
  }
}

new Easy_Widget_Finder_Plugin();
