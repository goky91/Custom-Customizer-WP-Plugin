<?php
/*
 * Register Custom Customizer section and instantiate all the classes received through array.
 * Array with customizer arguments is saved in the wp_options table under "custom_customizer_options".
 * */

namespace CCustomizer\Controllers;

if (!defined('ABSPATH')) {
    die;
}


class CustomCustomizerBuilder
{

    /**
     * @var $sectionIdProp string
     */
    public $sectionIdProp;

    /**
     * @var $customizerArgs array
     */
    public $customizerArgs;


    public function __construct()
    {
        $this->sectionIdProp  = 'custom_customizer';
        $this->customizerArgs = get_option('custom_customizer_options');

        add_action('customize_register', [$this, 'addCustomCustomizerSection']);
    }


    public function addCustomCustomizerSection($wp_customize)
    {

        // Add New Section
        $wp_customize->add_section(
            $this->sectionIdProp,
            [
                'title'    => 'Custom Customizer Fields',
                'priority' => 100
            ]
        );


        // Instantiate each class from the model folder multiple times if needed
        foreach ($this->customizerArgs as $customizerArg) {

            $className   = $customizerArg[0] ?? "";
            $settingUniqueName = $customizerArg[1] ?? "";
            $label       = $customizerArg[2] ?? "";

            $settingCLass = "\CCustomizer\Models\\" .  $className;

            if (!class_exists($settingCLass)) {
                return;
            }

            $settingCLass::getInstance()->render($settingUniqueName, $label, $this->sectionIdProp);
        }
    }
}
