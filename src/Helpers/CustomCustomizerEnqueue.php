<?php

class CustomCustomizerEnqueue
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'customCustomizerEnqueueScripts']);

    }


    public function customCustomizerEnqueueScripts()
    {
        if (is_admin()) {
            wp_enqueue_script('c-customizer-admin-js', C_CUSTOMIZER_DIR . 'admin/js/c-customizer-admin.js', array(), '1.0.0', true);
        }
    }

}