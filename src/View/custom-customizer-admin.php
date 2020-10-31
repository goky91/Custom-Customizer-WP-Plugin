<?php
$currentOptions = get_option( 'custom_customizer_options' ) ? get_option( 'custom_customizer_options' ) : [];
$optionsCount = count( $currentOptions );
?>
     <h1>Build or Edit Custom Sections</h1>
    <form id='custom-customizer-form' method="post" data-counter="<?php echo $optionsCount ?>" >

        <?php
            $counter = 0;
            foreach ( $currentOptions as $customizerOption ) : ?>
                <div id="row-<?php echo $counter ?>">
                    <span id="delete-<?php echo $counter ?>">X</span>
                    <select id="select-input-<?php echo $counter ?>" name="select-name-<?php echo $counter ?>">
                        <option id="option-1" value="ImageUploadSettingBuilder" <?php checkIfSelected( "ImageUploadSettingBuilder", $customizerOption[0] ); ?> >ImageUploadSettingBuilder</option>
                        <option id="option-2" value="ColorPickSettingBuilder" <?php checkIfSelected( "ColorPickSettingBuilder", $customizerOption[0] ); ?> >ColorPickSettingBuilder</option>
                        <option id="option-3" value="TextInputSettingBuilder" <?php checkIfSelected( "TextInputSettingBuilder", $customizerOption[0] ); ?> >TextInputSettingBuilder</option>
                        <option id="option-4" value="CheckboxInputSettingBuilder" <?php checkIfSelected( "CheckboxInputSettingBuilder", $customizerOption[0] ); ?> >CheckboxInputSettingBuilder</option>
                        <option id="option-5" value="SelectInputSettingBuilder" <?php checkIfSelected( "SelectInputSettingBuilder", $customizerOption[0] ); ?> >SelectInputSettingBuilder</option>
                        <option id="option-6" value="RadioInputSettingBuilder" <?php checkIfSelected( "RadioInputSettingBuilder", $customizerOption[0] ); ?> >RadioInputSettingBuilder</option>
                        <option id="option-7" value="TextAreaInputSettingBuilder" <?php checkIfSelected( "TextAreaInputSettingBuilder", $customizerOption[0] ); ?> >TextAreaInputSettingBuilder</option>
                        <option id="option-8" value="MediaUploadSettingBuilder" <?php checkIfSelected( "MediaUploadSettingBuilder", $customizerOption[0] ); ?> >MediaUploadSettingBuilder</option>
                    </select>
                    <input id="name-input-<?php echo $counter ?>" value="<?php echo $customizerOption[1] ?>" type="text" name="setting-name-<?php echo $counter ?>" placeholder="Enter name" required>
                    <input id="label-input-<?php echo $counter ?>" value="<?php echo $customizerOption[2] ?>" type="text" name="label-name-<?php echo $counter ?>" placeholder="Enter label" required>
                    <span id="endpoint-<?php echo $counter ?>"><pre>get_theme_mod(" <?php echo $customizerOption[1] ?> ");</pre></span><hr></div>

        <?php
                $counter++;
                endforeach;
                submit_button('Save Customizer','primary', 'submit', true); ?>
    </form>
     <hr>
     <button class='primary'>Add New Setting</button>
<?php

function checkIfSelected( $string, $optionValue )
{
    if ( $string === $optionValue ) :
        echo " selected=\"selected\" ";
    endif;
}

if ( ! empty( $_POST  ) ) :
    $arr = $_POST;
    unset($arr['submit']);

    update_option( 'custom_customizer_options', array_chunk( $arr, 3 ) );
    endif;
