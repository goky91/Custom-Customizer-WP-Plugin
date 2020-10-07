<?php


class MediaUploadSettingBuilder
{

    public function __construct ( $uniqueId, $label, $sectionToUse, $wp_customize )
    {
        $this->newId = $uniqueId;
        $this->newLabel = $label;
        $this->sectionToUse = $sectionToUse;

         $this->addMediaUploadSetting( $wp_customize );
    }

    public function addMediaUploadSetting ( $wp_customize ) {
        $settingId = $this->newId . '_media_setting';
        $controlId = $this->newId . '_media_control';

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
            new WP_Customize_Media_Control (
                $wp_customize,
                $controlId,
                [
                    'label'             => $this->newLabel,
                    'section'           => $this->sectionToUse,
                    'settings'          => $settingId,
                    'description'       => 'Use get_theme_mod(\' ' . $settingId . ' \'); as endpoint',
                    'mime_type' => 'image',  // Required. Can be image, audio, video, application, text
                    'button_labels' => array( // Optional
                        'select' => __( 'Select File' ),
                        'change' => __( 'Change File' ),
                        'default' => __( 'Default' ),
                        'remove' => __( 'Remove' ),
                        'placeholder' => __( 'No file selected' ),
                        'frame_title' => __( 'Select File' ),
                        'frame_button' => __( 'Choose File' ),
                    )
                ]
            )
        );
    }

}