<?php


class CustomCustomizerBuilder
{
    public $sectionIdProp;
    public $sectionsArray = [];
    public $customizerArgs = [];

    public function __construct($sectionId, $customizerArgs)
    {
        $this->sectionIdProp = $sectionId;
        $this->customizerArgs = $customizerArgs;
        add_action('customize_register', [$this, 'checkIfSectionExists']);

    }

    public function checkIfSectionExists($wp_customize)
    {

        foreach ($wp_customize->sections() as $section_key => $section_object) {
            array_push($this->sectionsArray, $section_key);
        }

        if (in_array($this->sectionIdProp, $this->sectionsArray)) {

            // Use Existing Section
            foreach ($this->customizerArgs as $customizerArg) {
                new $customizerArg['class_name']($customizerArg['setting_name'], $customizerArg['control_label'], $this->sectionIdProp, $wp_customize);
            }

        } else {
            // Add New Section
            $wp_customize->add_section
            (
                $this->sectionIdProp,
                [
                    'title' => 'Goranov Section',
                    'priority' => 100
                ]
            );

            foreach ($this->customizerArgs as $customizerArg) {
                new $customizerArg['class_name']($customizerArg['setting_name'], $customizerArg['control_label'], $this->sectionIdProp, $wp_customize);
            }

        }
    }

}