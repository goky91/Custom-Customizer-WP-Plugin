<?php
/*
 * Color picker input
 * */

class ColorPickSettingBuilder
{

    public function __construct ( $uniqueId ,$label ,$sectionToUse ,$wp_customize )
    {
        $this -> newId        = $uniqueId;
        $this -> newLabel     = $label;
        $this -> sectionToUse = $sectionToUse;

        $this -> addColorPickerSetting ( $wp_customize );
    }

    public function addColorPickerSetting ( $wp_customize )
    {
        $settingId = $this -> newId . '_color_setting';
        $controlId = $this -> newId . '_color_control';

        // Add color picker setting
        $wp_customize -> add_setting (
            $settingId ,
            [
                'default'           => "" ,
                'type'              => 'theme_mod' ,
                'capability'        => 'edit_theme_options' ,
                'sanitize_callback' => 'sanitize_hex_color'
            ]
        );

        // Add color picker control
        $wp_customize -> add_control (
            new WP_Customize_Color_Control (
                $wp_customize ,
                $controlId ,
                [
                    'label'       => $this -> newLabel ,
                    'section'     => $this -> sectionToUse ,
                    'settings'    => $settingId ,
                    'description' => $settingId
                ]
            )
        );
    }

}