<?php
/*
 * Register Custom Customizer section and instantiate all the classes received through array.
 * Array with customizer arguments is saved in the wp_options table under "custom_customizer_options".
 * */

class CustomCustomizerBuilder
{
    use CustomizerSingletonTrait;

    public $sectionIdProp;
    public $customizerArgs;

    public function __construct ()
    {
        $this->sectionIdProp  = 'custom_customizer';
        $this->customizerArgs = get_option ( 'custom_customizer_options' );
        add_action ( 'customize_register', [ $this, 'addCustomCustomizerSection' ] );

    }

    public function addCustomCustomizerSection ( $wp_customize )
    {

        // Add New Section
        $wp_customize->add_section
        (
            $this->sectionIdProp,
            [
                'title'    => 'Custom Customizer',
                'priority' => 100
            ]
        );

        // Instantiate each class from the model folder multiple times if needed
        foreach ( $this->customizerArgs as $customizerArg ) {

            $className   = isset( $customizerArg[ 0 ] ) ? $customizerArg[ 0 ] : "";
            $settingName = isset( $customizerArg[ 1 ] ) ? $customizerArg[ 1 ] : "";
            $label       = isset( $customizerArg[ 2 ] ) ? $customizerArg[ 2 ] : "";

            new $className( $settingName, $label, $this->sectionIdProp, $wp_customize );
        }


    }

}