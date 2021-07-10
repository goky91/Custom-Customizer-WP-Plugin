<?php
/* Template Method design pattern */

namespace CCustomizer\Models;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

abstract class Setting
{
    protected $settingPrefix;
    protected $settingID;
    protected $controlID;


    final protected function renderCustomizerSetting($uniqueID, $label, $sectionToUse) {
        global $wp_customize;

        $this->buildIDs($uniqueID, $this->settingPrefix);
        $this->buildSetting($wp_customize);
        $this->buildControl($wp_customize);
    }


    final protected function buildIDs($uniqueID, $settingPrefix)
    {
        $this->settingID = $uniqueID . $settingPrefix . '_setting';
        $this->controlID = $uniqueID . $settingPrefix . '_control';
    }
    

    protected function buildSetting($wp_customize) {
        $wp_customize->add_setting(
            $this->settingID,
            [
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
            ]
        );
    }

    
    abstract protected function buildControl($wp_customize);
}
