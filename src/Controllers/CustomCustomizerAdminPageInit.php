<?php
/*
 * Register and initiate Custom Customizer admin page.
 * */

namespace CCustomizer\Controllers;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


class CustomCustomizerAdminPageInit
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'customCustomizerAdminInit']);
    }


    public function customCustomizerAdminInit()
    {
        add_menu_page(
            'Custom Customizer',
            'Build Customizer',
            'manage_options',
            'custom-customizer-menu',
            [$this, "ccAdminPage"]
        );
    }


    public function ccAdminPage()
    {
        include_once(C_CUSTOMIZER_PATH . '/templates/custom-customizer-admin.php');
    }
}
