<?php

/*
 * Plugin Name:       Custom Customizer
 * Plugin URI:        /
 * Description:       Quickly register wp customizer sections, settings and controllers that you can use for development.
 * Version:           1.0.0
 * Author:            Goran Spasojevic
 * Author URI:        https://www.linkedin.com/in/goran-s/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-customizer
 * Domain Path:       /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

define( 'C_CUSTOMIZER_DIR',  plugin_dir_path( __FILE__ ) );

require_once ( C_CUSTOMIZER_DIR . '\src\Helpers\custom-customizer-includes.php' );

new CustomCustomizerAdminPageInit();
new CustomCustomizerEnqueue();


function initiate_custom_customizer ( ) {


    $customizerArgs = [
        [
            'class_name' => 'ImageUploadSettingBuilder',
            'setting_name' => 'goran_setting',
            'control_label' => 'Goran Label'
        ],
        [
            'class_name' => 'ImageUploadSettingBuilder',
            'setting_name' => 'goran_setting43',
            'control_label' => 'Goran Label4343'
        ],
        [
            'class_name' => 'ColorPickSettingBuilder',
            'setting_name' => 'goran_setting2',
            'control_label' => 'Goran Label2'
        ],
        [
            'class_name' => 'TextInputSettingBuilder',
            'setting_name' => 'goran_settingdsad',
            'control_label' => 'Goran Labeldasdsad'
        ],
        [
            'class_name' => 'CheckboxInputSettingBuilder',
            'setting_name' => 'goran_settingdsaddsada',
            'control_label' => 'Goran Labeldasdsdsadaad'
        ],
        [
            'class_name' => 'SelectInputSettingBuilder',
            'setting_name' => 'goran_settingdsaddsada',
            'control_label' => 'Goran Labeldasdsdsadaad'
        ],

        [
            'class_name' => 'RadioInputSettingBuilder',
            'setting_name' => 'goran_settingsaddsaddsada',
            'control_label' => 'Goran Labeldasdsdsadsdadaaad'
        ],

        [
            'class_name' => 'TextAreaInputSettingBuilder',
            'setting_name' => 'goran_settingsaddsaddsadssssa',
            'control_label' => 'Goran Labeldasdsdsadsdadadddaad'
        ],

        [
            'class_name' => 'MediaUploadSettingBuilder',
            'setting_name' => 'goran_settingsaddsadsaddsadssssa',
            'control_label' => 'Goran Labeldasdsdsadssdsadadadddaad'
        ],
    ];

    new CustomCustomizerBuilder('goran', $customizerArgs);
}

add_action( 'plugins_loaded', 'initiate_custom_customizer');


if( !function_exists("update_extra_post_info") ) {
    function update_extra_post_info() {
        update_option( 'custom-customizer-settings', 'custom_customizer_objects' );

    }
}

add_action( 'admin_init', 'update_extra_post_info' );
