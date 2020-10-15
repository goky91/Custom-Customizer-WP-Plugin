<?php

class CustomCustomizerEnqueue
{
    public function __construct()
    {
            add_action('admin_enqueue_scripts', [$this, 'customCustomizerEnqueueScripts'] );
    }

    public function customCustomizerEnqueueScripts()
    {
            wp_enqueue_script('c_customizer_admin_js',  plugins_url( 'custom-customizer/admin/js/c-customizer-admin.js' , C_CUSTOMIZER_DIR ), array(), '1.0', true );
    }
}