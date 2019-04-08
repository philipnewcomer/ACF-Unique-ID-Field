<?php

namespace PhilipNewcomer\ACF_Unique_ID_Field;

class ACF_Unique_ID_Field_Intializer{

    public static function init(){

        \add_action( 'acf/include_field_types', function() {

            if ( ! class_exists( 'acf_field' ) ) {
                return;
            }

            require_once( __DIR__ . '/class.ACF_Field_Unique_ID.php' );
            new ACF_Field_Unique_ID();
        } );

    }

}
