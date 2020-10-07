<?php
/*
 * Include all files
 */
$allIncludes = [
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

foreach ($allIncludes as $file) {
    require_once( C_CUSTOMIZER_DIR . $file );
}