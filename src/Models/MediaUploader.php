<?php
/*
 * Various media input field customizer builder
 * */

namespace CCustomizer\Models;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;
use CCustomizer\Traits\SanitizerTrait;
use WP_Customize_Media_Control;


class MediaUploader extends Setting
{
    use SingletonTrait;
    use SanitizerTrait;


    public function start($uniqueID, $label, $sectionToUse)
    {
        $this->settingPrefix = "_media_uploader_input";
        $this->ID        = $uniqueID;
        $this->label     = $label;
        $this->sectionToUse = $sectionToUse;

        $this->renderCustomizerSetting($uniqueID, $label, $sectionToUse);
    }



    protected function buildSetting($wp_customize)
    {
        $wp_customize->add_setting(
            $this->settingID,
            [
                'default'    => "",
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => [$this, 'sanitizeMediaField'],
            ]
        );
    }


    public function buildControl($wp_customize)
    {
        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                $this->settingID,
                [
                    'label'       => $this->label,
                    'section'     => $this->sectionToUse,
                    'settings'    => $this->settingID,
                    'description' => $this->settingID
                ]
            )
        );
    }
}
