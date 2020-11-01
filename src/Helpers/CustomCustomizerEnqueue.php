<?php
/*
 * Enqueue all scripts and styles here.
 * */

class CustomCustomizerEnqueue
{
    use CustomizerSingletonTrait;

    public function __construct ()
    {
        add_action ( 'admin_enqueue_scripts', [ $this, 'customCustomizerEnqueueScripts' ] );
    }

    public function customCustomizerEnqueueScripts ()
    {
        wp_enqueue_script ( 'c_customizer_admin_js', plugins_url ( 'custom-customizer/admin/js/c-customizer-admin.js', C_CUSTOMIZER_DIR ), array (), '1.0', true );
        wp_enqueue_style ( 'custom-customizer-style', plugins_url ( 'custom-customizer/admin/css/customizer-style.css', C_CUSTOMIZER_DIR ) );
    }
}