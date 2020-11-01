var customizerArgsJs = [];
var addNewSectionBtn = document.querySelector('.primary');
var container = document.getElementById('custom-customizer-form');
var counter = container.dataset.counter;

var allClasses = [
    'ImageUploadSettingBuilder',
    'ColorPickSettingBuilder',
    'TextInputSettingBuilder',
    'CheckboxInputSettingBuilder',
    'SelectInputSettingBuilder',
    'RadioInputSettingBuilder',
    'TextAreaInputSettingBuilder',
    'MediaUploadSettingBuilder'
];

addNewSectionBtn.addEventListener('click', function () {

    var obj = new Object();

    var row = document.createElement('div');
    row.id = 'row-' + counter;

    generateNew( obj, row );

    counter++;
});



function generateNew( object, row ) {

    object.id = counter.toString();

    deleteSetting( object, row )
    selectSetting( object, row );
    enterName( object, row );
    enterLabel( object, row );
    //showEndpoint( object, row );

    customizerArgsJs.push( object );

    container.prepend( row );
}

function deleteSetting ( object, row ) {
    var x = document.createElement('span');
    x.id = 'delete-' + object.id;
    x.innerText = "X";
    x.addEventListener( 'click', function () {
        row.remove();
        removeFromArgs( object );
    } );
    row.appendChild( x );
}

function selectSetting ( object, row ) {
    var optionCounter = 0;

    var input = document.createElement('select');
    input.id = 'select-input-' + object.id;
    input.name = 'select-name-' + object.id;

    allClasses.forEach( function ( singleClass ) {
        optionCounter++;
        var option = document.createElement('option');
        option.id = 'option-' + optionCounter;
        option.value = singleClass;
        option.innerText = singleClass;
        input.appendChild( option );
    } );

    input.addEventListener('click', function () {
        object.className = input.value;
    });

    row.appendChild( input );
}

function enterName ( object, row ) {
    var input = document.createElement("input");
    input.id = 'name-input-' + object.id;
    input.type = 'text';
    input.name = 'setting-name-' + object.id;
    input.placeholder = 'Enter name';
    input.required = true;

    row.appendChild(input);

    input.addEventListener('keyup', function () {
        var endpointName = document.getElementById( 'endpoint-' + object.id );

        object.name = input.value;
        endpointName.innerText = 'get_theme_mod( \' ' + input.value + ' \' )';
    })
}

function enterLabel ( object, row ) {
    var input = document.createElement("input");
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

function showEndpoint ( object, row ) {
    var string = document.createElement("span");
    string.id = 'endpoint-' + object.id;
    string.innerText = object.name;
    row.appendChild(string);
}

function removeFromArgs ( objectToRemove ) {

    customizerArgsJs = customizerArgsJs.filter( function ( item ) {
        return item !== objectToRemove
    })
}

/*delete existing rows*/
var deleteBtns = document.querySelectorAll('span[id*="delete"]');
deleteBtns.forEach( function ( btn ) {
    btn.addEventListener( 'click', function ( e ) {
        this.parentNode.remove();
    } );
} );