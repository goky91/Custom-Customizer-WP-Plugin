<?php

namespace CCustomizer\Models;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;


class TextInput extends Setting
{
    use SingletonTrait;


    public function start($uniqueID, $label, $sectionToUse)
    {
        $this->settingPrefix = "_text_input";
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
                'default'           => "",
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            ]
        );
    }


    public function buildControl($wp_customize)
    {
        $wp_customize->add_control(
            $this->settingID,
            [
                'label'       => $this->label,
                'type'        => 'text',
                'section'     => $this->sectionToUse,
                'settings'    => $this->settingID,
                'description' => $this->settingID
            ]
        );
    }
}
