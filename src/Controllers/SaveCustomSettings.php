<?php
/*
 * Save Custom Customizer Settings with AJAX.
 * */

namespace CCustomizer\Controllers;

if (!defined('ABSPATH')) {
    die;
}


class SaveCustomSettings
{
    public function __construct()
    {
        add_action('wp_ajax_save_ccustomizer_settings', [$this, 'saveCustomizerSettings']);
    }


    function saveCustomizerSettings()
    {
        if (!$_POST['savedData']) {
            wp_die();
        }

        update_option('custom_customizer_options', $_POST['savedData'], true);
        wp_die();
    }
}
