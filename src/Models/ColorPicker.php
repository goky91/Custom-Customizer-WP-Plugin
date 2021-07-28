<?php

namespace CCustomizer\Models;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;
use WP_Customize_Color_Control;


class ColorPicker extends Setting
{
    use SingletonTrait;

    const SETTING_PREFIX = '_color_pick';


    protected function buildSetting($wp_customize)
    {
        $wp_customize->add_setting(
            $this->settingID,
            [
                'default'           => "",
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_hex_color'
            ]
        );
    }


    public function buildControl($wp_customize)
    {
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
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
