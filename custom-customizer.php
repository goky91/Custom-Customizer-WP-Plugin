<?php
/*
 * Plugin Name:       Custom Customizer
 * Plugin URI:        /
 * Description:       Quickly register wp customizer sections, settings and controllers that you can use for development.
 * Version:           1.0.1
 * Author:            Goran Spasojevic
 * Author URI:        https://www.linkedin.com/in/goran-s/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-customizer
 * Domain Path:       /languages
*/

if (!defined ( 'ABSPATH' )) {
    die;
}

/*
 * Prepare dependencies
 * */
define ( 'C_CUSTOMIZER_DIR' , plugin_dir_path ( __FILE__ ) );
require_once ( C_CUSTOMIZER_DIR . '\src\Traits\CustomizerSingletonTrait.php' );
require_once ( C_CUSTOMIZER_DIR . '\src\Traits\SanitizerTrait.php' );
require_once ( C_CUSTOMIZER_DIR . '\src\Helpers\CustomCustomizerIncludes.php' );

/*
 * Register custom option on plugin activation
 * */
function addCustomCustomizerOption ()
{
    add_option ( 'custom_customizer_options' , [] );
}
register_activation_hook ( __FILE__ , 'addCustomCustomizerOption' );

/*
 * Clean up database from custom option on plugin removal
 * */
function removeCustomCustomizerOption ()
{
    delete_option ( 'custom_customizer_options' );
}
register_uninstall_hook ( __FILE__ , 'removeCustomCustomizerOption' );

/*
 * Include all the necessary files
 * */
CustomCustomizerIncludes::getInstance ();

/*
 * Initiate admin page for the plugin
 * */
CustomCustomizerAdminPageInit::getInstance ();

/*
 * Enqueue scripts and styles for the admin page
 * */
CustomCustomizerEnqueue::getInstance ();

/*
 * Initiate Custom Customizer plugin
 * */
function initiate_custom_customizer ()
{
    CustomCustomizerBuilder::getInstance ();
}
add_action ( 'plugins_loaded' , 'initiate_custom_customizer' );