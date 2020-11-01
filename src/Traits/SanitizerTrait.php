<?php
/*
 * Custom input sanitization functions go here.
 * */

trait SanitizerTrait
{
    /*
     * Sanitize image input field
     * */
    public function sanitizeImageField ( $file ,$setting )
    {
        //allowed file types
        $mimes = [
            'jpg|jpeg|jpe' => 'image/jpeg' ,
            'gif'          => 'image/gif' ,
            'png'          => 'image/png' ,
        ];

        //check file type from file name
        $file_ext = wp_check_filetype ( $file ,$mimes );

        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext[ 'ext' ] ? $file : $setting->default );
    }


}