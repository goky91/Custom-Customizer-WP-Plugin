<?php ?>
     <h1>Build or Edit Custom Sections</h1>
     <div class='admin-custom-customizer'>
     <select>
            <?php foreach ($allClasses as $class) { ?>
                 <option> <?php echo $class; ?> </option>
            <?php } ?>
     </select>
     <input type='text' placeholder='enter name'>
     <input type='text' placeholder='enter label'>
     <span>get_theme_mod('example_setting)</span>
     </div>
     <hr>
     <button class='primary'>Add New Setting</button>
     <hr>
     <button>Add New Section</button>
    <?php submit_button('Save Customizer');