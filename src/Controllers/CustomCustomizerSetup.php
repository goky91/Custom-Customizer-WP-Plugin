<?php


class CustomCustomizerSetup
{

    use CustomizerSingleton;


    public function __construct()
    {

        register_activation_hook( C_CUSTOMIZER_DIR . '/custom-customizer.php', [$this, 'createDatabaseTable'] );
        register_uninstall_hook( __FILE__, $this->databaseCleanup() );

    }


    public function createDatabaseTable()
{
    /*
     * Create a database table for our plugin
     * */

    $arr = $_POST;
    array_shift( $arr );
    array_chunk( $arr, 3 );
    global $wpdb;

    $tableName = $wpdb->prefix . 'c_customizer_settings';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tableName (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      name tinytext NOT NULL,
      text text NOT NULL,
      url varchar(55) DEFAULT '' NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}


public function databaseCleanup()
{
    global $wpdb;
    $tableName = $wpdb->prefix . 'c_customizer_settings';

    $sql = "DROP TABLE IF EXISTS $tableName";
    $wpdb->query($sql);

}

}