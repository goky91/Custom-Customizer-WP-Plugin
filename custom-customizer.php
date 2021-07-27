<?php
/*
 * Plugin Name:       Custom Customizer
 * Plugin URI:        /
 * Description:       Quickly register wp customizer sections, settings and controllers that you can use for development.
 * Version:           1.2.0
 * Author:            Goran Spasojevic
 * Author URI:        https://www.linkedin.com/in/goran-s/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-customizer
 * Domain Path:       /languages
*/

if (!defined('ABSPATH')) {
    die;
}

require 'vendor/autoload.php';

use CCustomizer\Controllers\CustomCustomizerAdminPageInit;
use CCustomizer\Controllers\SaveCustomSettings;
use CCustomizer\Helpers\CustomCustomizerEnqueue;
use CCustomizer\Controllers\CustomCustomizerBuilder;


define('C_CUSTOMIZER_PATH', plugin_dir_path(__FILE__));
define('C_CUSTOMIZER_VERSION', '1.2.0');


/*
 * Register custom option on plugin activation
 * */
function addCustomCustomizerOption()
{
    add_option('custom_customizer_options', []);
}
register_activation_hook(__FILE__, 'addCustomCustomizerOption');


/*
 * Clean up database from custom option on plugin removal
 * */
function removeCustomCustomizerOption()
{
    delete_option('custom_customizer_options');
}
register_uninstall_hook(__FILE__, 'removeCustomCustomizerOption');


new CustomCustomizerAdminPageInit();
new SaveCustomSettings();
new CustomCustomizerEnqueue();
new CustomCustomizerBuilder();