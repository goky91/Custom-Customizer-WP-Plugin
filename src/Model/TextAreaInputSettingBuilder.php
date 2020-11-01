<?php
/*
 * Text Area customizer input builder.
 * */

class TextAreaInputSettingBuilder
{

    public function __construct ( $uniqueId, $label, $sectionToUse, $wp_customize )
    {
        $this -> newId        = $uniqueId;
        $this -> newLabel     = $label;
        $this -> sectionToUse = $sectionToUse;

        $this -> addTextAreaInputSetting ( $wp_customize );
    }

    public function addTextAreaInputSetting ( $wp_customize )
    {
        $settingId = $this -> newId . '_text_input_setting';
        $controlId = $this -> newId . '_text_input_control';


        // Add text area setting
        $wp_customize -> add_setting (
            $settingId,
            [
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            ]
        );

        // Add text area control
        $wp_customize -> add_control (
            $controlId,
            [
                'label'       => $this -> newLabel,
                'type'        => 'textarea',
                'section'     => $this -> sectionToUse,
                'settings'    => $settingId,
                'description' => $settingId
            ]
        );
    }

}