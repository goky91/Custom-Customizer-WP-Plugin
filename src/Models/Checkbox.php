<?php

namespace CCustomizer\Models;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;


class Checkbox extends Setting
{
    use SingletonTrait;


    public function start($uniqueID, $label, $sectionToUse)
    {
        $this->settingPrefix = "_checkbox_input";
        $this->ID        = $uniqueID;
        $this->label     = $label;
        $this->sectionToUse = $sectionToUse;

        $this->renderCustomizerSetting($uniqueID, $label, $sectionToUse);
    }


    public function buildControl($wp_customize)
    {
        $wp_customize->add_control(
            $this->controlID,
            [
                'label'       => $this->label,
                'type'        => 'checkbox',
                'section'     => $this->sectionToUse,
                'settings'    => $this->settingID,
                'description' => $this->settingID
            ]
        );
    }
}
