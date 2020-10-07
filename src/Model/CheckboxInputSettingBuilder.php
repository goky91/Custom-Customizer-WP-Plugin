<?php


class CheckboxInputSettingBuilder
{

    public function __construct ( $uniqueId, $label, $sectionToUse, $wp_customize  )
    {
        $this->newId = $uniqueId;
        $this->newLabel = $label;
        $this->sectionToUse = $sectionToUse;

        $this->addImageUploadSetting( $wp_customize );
    }

    public function addImageUploadSetting ( $wp_customize ) {
        $settingId = $this->newId . '_checkbox_input_setting';
        $controlId = $this->newId . '_checkbox_input_control';


        // Add header image Setting
        $wp_customize -> add_setting (
            $settingId,
            [
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            ]
        );

        // Add header image Control
        $wp_customize-> add_control (
                $controlId,
                [
                    'label'             => $this->newLabel,
                    'type'           => 'checkbox',
                    'section'           => $this->sectionToUse,
                    'settings'          => $settingId,
                    'description'       => 'Use get_theme_mod(\' ' . $settingId . ' \'); as endpoint'
                ]
        );
    }

}