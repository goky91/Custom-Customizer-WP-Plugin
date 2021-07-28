var customizerArgsJs = [];
var addNewSectionBtn = document.querySelector('.primary');
var container = document.getElementById('custom-customizer-form');
var counter = container.dataset.counter;

var allClasses = [
    'ImageUploader',
    'ColorPicker',
    'TextInput',
    'Checkbox',
    'TextArea',
    'MediaUploader'
];


addNewSectionBtn.addEventListener('click', function () {

    var obj = new Object();

    var row = document.createElement('div');

    row.classList.add("cc-rows");
    row.id = 'row-' + counter;

    generateNew(obj, row);

    counter++;
});



function generateNew(object, row) {

    object.id = counter.toString();

    deleteSetting(object, row)
    //showEndpoint( object, row );
    selectSetting(object, row);
    enterName(object, row);
    enterLabel(object, row);

    customizerArgsJs.push(object);

    container.prepend(row);
}


function deleteSetting(object, row) {
    var x = document.createElement('span');
    x.id = 'delete-' + object.id;
    x.innerText = "X";
    x.addEventListener('click', function () {
        row.remove();
        removeFromArgs(object);
    });
    row.appendChild(x);
}


function selectSetting(object, row) {
    var optionCounter = 0;

    var input = document.createElement('select');

    input.classList.add("cc-rows__select");
    input.id = 'select-input-' + object.id;
    input.name = 'select-name-' + object.id;

    allClasses.forEach(function (singleClass) {
        optionCounter++;
        var option = document.createElement('option');
        option.id = 'option-' + optionCounter;
        option.value = singleClass;
        option.innerText = singleClass;
        input.appendChild(option);
    });

    input.addEventListener('click', function () {
        object.className = input.value;
    });

    row.appendChild(input);
}


function enterName(object, row) {
    var input = document.createElement("input");

    input.classList.add("cc-rows__name");
    input.id = 'name-input-' + object.id;
    input.type = 'text';
    input.name = 'setting-name-' + object.id;
    input.placeholder = 'Enter name';
    input.required = true;

    row.appendChild(input);
}


function enterLabel(object, row) {
    var input = document.createElement("input");

    input.classList.add("cc-rows__label");
    input.id = 'label-input-' + counter;
    input.type = 'text';
    input.name = 'label-name-' + object.id;
    input.placeholder = 'Enter label';
    input.required = true;

    row.appendChild(input);

    input.addEventListener('keyup', function () {
        object.label = input.value;
    })
}


function removeFromArgs(objectToRemove) {

    customizerArgsJs = customizerArgsJs.filter(function (item) {
        return item !== objectToRemove
    })
}


/*delete existing rows*/
var deleteBtns = document.querySelectorAll('span[id*="delete"]');
deleteBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        this.parentNode.remove();
    });
});


/**
 * Save plugin settings with AJAX.
*/
(function () {

    var dataArr = [];

    var collectRows = function () {
        jQuery('.cc-rows').each(function () {
            dataArr.push(
                [
                    jQuery(this).children('.cc-rows__select').find(":selected").text(),
                    jQuery(this).children('.cc-rows__name').val(),
                    jQuery(this).children('.cc-rows__label').val()
                ]
            );
        });
    }

    jQuery('#submit').click(function (e) {
        e.preventDefault();
        collectRows();

        jQuery.ajax({
            url: ccustomizer.ajaxURL,
            type: 'post',
            dataType: "html",
            data: {
                action: 'save_ccustomizer_settings',
                savedData: dataArr
            }
        });

    });
})();