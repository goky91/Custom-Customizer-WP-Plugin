<?php
/*
 * Include all files needed for classes to work, etc.
 * */

class CustomCustomizerIncludes
{

    use CustomizerSingletonTrait;

    public function __construct()
    {
        foreach ($this->allIncludes as $file) {
            require_once( C_CUSTOMIZER_DIR . $file );
        }
    }

    public $allIncludes = [
                '\src\Model\ImageUploadSettingBuilder.php',
                '\src\Model\ColorPickSettingBuilder.php',
                '\src\Model\TextInputSettingBuilder.php',
                '\src\Model\CheckboxInputSettingBuilder.php',
                '\src\Model\SelectInputSettingBuilder.php',
                '\src\Model\RadioInputSettingBuilder.php',
                '\src\Model\TextAreaInputSettingBuilder.php',
                '\src\Model\MediaUploadSettingBuilder.php',
                '\src\Controllers\CustomCustomizerBuilder.php',
                '\src\Controllers\CustomCustomizerAdminPageInit.php',
                '\src\Helpers\CustomCustomizerEnqueue.php'
                ];

}