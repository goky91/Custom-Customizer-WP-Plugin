<?php


class CustomCustomizerAdminPageInit
{

    public function __construct()
    {
        add_action('admin_menu', [ $this, 'c_customizer_setup_menu' ] );

    }


    function c_customizer_setup_menu(){
        add_menu_page(
            'Custom Customizer',
            'Build Customizer',
            'manage_options',
            'custom-customizer-menu',
            [ $this, "custom_customizer_admin_page_init" ]
        );
    }

    function custom_customizer_admin_page_init (){

        $allClasses = [
            'ImageUploadSettingBuilder',
            'ColorPickSettingBuilder',
            'TextInputSettingBuilder',
            'CheckboxInputSettingBuilder',
            'SelectInputSettingBuilder',
            'RadioInputSettingBuilder',
            'TextAreaInputSettingBuilder',
            'MediaUploadSettingBuilder'
        ];

        require_once (C_CUSTOMIZER_DIR . 'src/view/custom-customizer-admin.php');

    }

}