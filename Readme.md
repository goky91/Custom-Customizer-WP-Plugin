# Custom Customizer WP Plugin
Register Custom Customizer section and quickly add WP customizer options.

## About The Project
Choose from basic customizer options and build your own section in the WP Customizer API.
In the customizer menu, you can see each setting ID which you can use to load thorugh <b>get_theme_mod()</b> function.
#
## Development
### Models
Developed with Template Method behavioral design pattern in mind.

```Setting.php``` class is used as superclass which contains a template method that defines steps for the algorithm, some steps can be overriden while others can't.

Each model class can extend the abstract Setting class and override methods for building customizer setting and control.

If algorithm becomes more complicated, consider adding hooks on crucial steps of the algorithm.

### Sanitization of user inputs
Instead of using Helper classes, we use a Sanitizer Trait to store and add new sanitization methods. All models share these sanitization methods since most of them use the same sanitization functions like TextArea and TextInput classes.

### Controllers
Initiate the plugin's admin page, instantiate model classes according to the client's requests and handle saving the plugin's settings with AJAX.

### Helpers
Handle scripts and styles for the plugin's UI.