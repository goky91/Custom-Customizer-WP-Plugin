<?php
/* Template Method design pattern */

namespace CCustomizer\Models;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

abstract class Setting
{
    /**
     *  @var SETTING_PREFIX [string]
     */
    protected const SETTING_PREFIX = '';

    /**
     *  @var $ID [string]
     */
    protected $ID;

    /**
     *  @var $label [string]
     */
    protected $label;

    /**
     *  @var $sectionToUse [string]
     */
    protected $sectionToUse;

    /**
     * @var $settingID [string]
     */
    protected $settingID;

    /**
     * @var $controlID [string]
     */
    protected $controlID;


    final public function render($uniqueName, $label, $sectionToUse)
    {
        global $wp_customize;

        $this->ID = $uniqueName;
        $this->label = $label;
        $this->sectionToUse = $sectionToUse;

        $this->buildIDs($this->ID, self::SETTING_PREFIX);
        $this->buildSetting($wp_customize);
        $this->buildControl($wp_customize);
    }


    final protected function buildIDs($uniqueID, $settingPrefix)
    {
        $this->settingID = $uniqueID . self::SETTING_PREFIX . '_setting';
        $this->controlID = $uniqueID . self::SETTING_PREFIX . '_control';
    }


    protected function buildSetting($wp_customize)
    {
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
