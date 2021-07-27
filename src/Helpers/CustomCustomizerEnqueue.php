<?php
/*
 * Enqueue all scripts and styles here.
 * */

namespace CCustomizer\Helpers;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


class CustomCustomizerEnqueue
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'customCustomizerEnqueueScripts']);
    }


    public function customCustomizerEnqueueScripts($adminPage)
    {
        if ($adminPage !== 'toplevel_page_custom-customizer-menu') {
            return;
        }

        wp_enqueue_style('custom-customizer-style', plugins_url('custom-customizer/admin/css/customizer-style.css', C_CUSTOMIZER_PATH, array(), C_CUSTOMIZER_VERSION));
        wp_enqueue_script('c_customizer_admin_js', plugins_url('custom-customizer/admin/js/c-customizer-admin.js', C_CUSTOMIZER_PATH), array(), C_CUSTOMIZER_VERSION, true);

        wp_localize_script(
            'c_customizer_admin_js',
            'ccustomizer',
            [
                'ajaxURL' => admin_url('admin-ajax.php')
            ]
        );
    }
}
