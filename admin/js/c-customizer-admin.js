var customizerArgsJs = [];
var addNewSectionBtn = document.querySelector('.primary');

addNewSectionBtn.addEventListener('click', function () {
    console.log('cccc');

    customizerArgsJs.push(
        {
            class_name : 'ImageUploadSettingBuilder',
            setting_name : 'goran_setting',
            control_label : 'Goran Label'
        }
    );

    console.log(customizerArgsJs);

    document.getElementById( 'wpbody-content' ).innerHTML += `
        <div class='admin-custom-customizer'>
        <input type='text' placeholder='enter name'>
        <input type='text' placeholder='enter label'>
        <span>get_theme_mod('example_setting)</span>
        </div>
        `;


});