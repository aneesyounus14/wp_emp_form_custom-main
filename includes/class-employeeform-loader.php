<?php
/**
*employee_Loader.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'employee_loader' )){
    
    /**
    * Class employee_Loader.
    */
    class employee_Loader{

        public function __construct(){

            $this->includes();    

            $this->create_sms_database();

            add_action( 'admin_enqueue_scripts', array( $this, 'emp_enqueue_scripts' ) );

        }

        /**
        * Include Files depend on platform.
        */

        public function includes(){

            include_once 'class-employee-formtab.php';
            
        }

        /**
        * Include JS
        */
        public function emp_enqueue_scripts() {
			wp_enqueue_script( 'emp-tab-script', plugin_dir_url( __DIR__ ) . 'assets/js/employee-tab-script.js', array( 'jquery' ), wp_rand() );
		}

        public function create_sms_database(){

            global $wpdb;

            $table_name = $wpdb->prefix . "empdetails";

            $sql = "CREATE TABLE $table_name(

                image varchar(255) NOT NULL,
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                firstname varchar(50) NOT NULL,
                lastname varchar(50) NOT NULL,
                email varchar(55) NOT NULL,
                designation varchar(50) NOT NULL,
                dob date NOT NULL,
                gender VARCHAR( 30 ) NOT NULL ,
                skills mediumint(9) NOT NULL,
                city VARCHAR( 55 ) NOT NULL ,
                PRIMARY KEY(id)

            ) $charset_collate;";
            
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            dbDelta( $sql ); 

        }

    }   
    new employee_loader();
    
}


