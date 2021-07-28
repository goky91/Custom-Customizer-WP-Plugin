<?php

namespace CCustomizer\Models;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use CCustomizer\Traits\SingletonTrait;


class Checkbox extends Setting
{
    use SingletonTrait;

    protected const SETTING_PREFIX = '_checkbox_input';


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
