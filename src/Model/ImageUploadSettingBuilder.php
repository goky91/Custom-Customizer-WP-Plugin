<?php
/*
 * Image upload field
 * */

class ImageUploadSettingBuilder
{
    use SanitizerTrait;

    public function __construct ( $uniqueId , $label , $sectionToUse , $wp_customize )
    {
        $this -> newId        = $uniqueId;
        $this -> newLabel     = $label;
        $this -> sectionToUse = $sectionToUse;

        $this -> addImageUploadSetting ( $wp_customize );
    }

    public function addImageUploadSetting ( $wp_customize )
    {
        $settingId = $this -> newId . '_image_setting';
        $controlId = $this -> newId . '_image_control';

        // Add image Setting
        $wp_customize -> add_setting (
            $settingId ,
            [
                'default'    => "" ,
                'type'       => 'theme_mod' ,
                'capability' => 'edit_theme_options' ,
                'sanitize_callback' => [ $this, 'sanitizeImageField' ] ,
            ]
        );

        // Add image Control
        $wp_customize -> add_control (
            new WP_Customize_Image_Control (
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