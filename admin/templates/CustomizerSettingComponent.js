
class CustomizerSettingComponent {
    constructor() {
        this.generateSetting();
    }

    generateSetting = function () {
        return `
        <div class='admin-custom-customizer'>
            <input type='text' placeholder='enter name'>
            <input type='text' placeholder='enter label'>
            <span>get_theme_mod('example_setting)</span>
        </div>
         `
    }
}

export default CustomizerSettingComponent;