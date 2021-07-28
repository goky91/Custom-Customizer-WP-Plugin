<?php

namespace CCustomizer\Models;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;
use CCustomizer\Traits\SanitizerTrait;
use WP_Customize_Image_Control;


class ImageUploader extends Setting
{
    use SingletonTrait;
    use SanitizerTrait;

    const SETTING_PREFIX = '_image_upload';


    protected function buildSetting($wp_customize)
    {
        $wp_customize->add_setting(
            $this->settingID,
            [
                'default'    => "",
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => [$this, 'sanitizeImageField'],
            ]
        );
    }


    public function buildControl($wp_customize)
    {
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
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
