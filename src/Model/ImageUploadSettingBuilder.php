<?php


class ImageUploadSettingBuilder
{

    public function __construct ( $uniqueId, $label, $sectionToUse, $wp_customize )
    {
        $this->newId = $uniqueId;
        $this->newLabel = $label;
        $this->sectionToUse = $sectionToUse;

        $this->addImageUploadSetting($wp_customize);
    }

    public function addImageUploadSetting ($wp_customize) {
        $settingId = $this->newId . '_image_setting';
        $controlId = $this->newId . '_image_control';

        // Add header image Setting
        $wp_customize -> add_setting (
            $settingId,
            [
                'default' => (get_stylesheet_directory_uri() . 'assets/src/images/default-header-image.jpg') ,
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            ]
        );

        // Add header image Control
        $wp_customize-> add_control (
            new WP_Customize_Image_Control (
                $wp_customize,
                $controlId,
                [
                    'label'             => $this->newLabel,
                    'section'           => $this->sectionToUse,
                    'settings'          => $settingId,
                    'description'       => 'Use get_theme_mod(\' ' . $settingId . ' \'); as endpoint'
                ]
            )
        );
    }

}