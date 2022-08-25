<?php

/**
 *
 * @package employee-custom-form
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'submenu_employee_tab' ) ) {

	/**
	 * Class submenu_employee_tab.
	 */

	class submenu_employee_tab {

		/**
		 * Functions call
		 */
		public function __construct() {

			$this->insertdetails();

			$this->deleteQuery();

			$this->update_employee();

			$this->data_updating_in_employee_table();

			add_action( 'admin_menu', array( $this, 'employee_options_submenu' ) );

		}
		/**
		 * Function of subMenu in seetings
		 */
		public function employee_options_submenu() {

			add_submenu_page(
				'options-general.php',
				'Employee Details',
				'Employee Custom Details',
				'administrator',
				'employee-options',
				array( $this, 'employee_settings_page' ),
				null
			);
		}

		function employee_settings_page() {

			global $wpdb;

			$table_name = $wpdb->prefix . 'empdetails';
			$results    = $wpdb->get_results( "SELECT * FROM $table_name" );

			include_once plugin_dir_path( __DIR__ ) . 'template/employee-tab-form.php';
			include_once dirname( __DIR__ ) . '/template/class-fetch-data.php';
		}

		/**
		 * Function of inserting data in sql table
		 */
		public function insertdetails() {

			global $wpdb;

			if ( isset( $_POST['empsubmit'] ) ) {

				$table_name = $wpdb->prefix . 'empdetails';

				$empimage     = $_FILES['empimage'];
				$empfirstname = $_POST['empfirstname'];
				$emplastname  = $_POST['emplastname'];
				$empemail     = $_POST['empemail'];
				$empdesig     = $_POST['empdesig'];
				$empdob       = $_POST['emp_dob'];
				$gender       = $_POST['gender'];
				$skills       = $_POST['emp_skills'];
				$city         = $_POST['emp_city'];

				require_once ABSPATH . '/wp-includes/pluggable.php';
				require_once ABSPATH . 'wp-admin/includes/file.php';

				$upload = wp_handle_upload(
					$empimage,
					array( 'test_form' => false )
				);

				if ( ! empty( $upload['error'] ) ) {
					wp_die( $upload['error'] );
				}

				// it is time to add our uploaded image into WordPress media library
				$attachment_id = wp_insert_attachment(
					array(
						'guid'           => $upload['url'],
						'post_mime_type' => $upload['type'],
						'post_title'     => basename( $upload['file'] ),
						'post_content'   => '',
						'post_status'    => 'inherit',
					),
					$upload['file']
				);

				$profileimg = $upload['url'];

				if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
					wp_die( 'Upload error.' );
				}

				// update medatata, regenerate image sizes
				require_once ABSPATH . 'wp-admin/includes/image.php';

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata( $attachment_id, $upload['file'] )
				);

				$wpdb->insert(
					$table_name,
					array(
						'image'       => $profileimg,
						'firstname'   => $empfirstname,
						'lastname'    => $emplastname,
						'email'       => $empemail,
						'designation' => $empdesig,
						'dob'         => $empdob,
						'gender'      => $gender,
						'skills'      => $skills,
						'city'        => $city,
					)
				);
			}
		}

		/**
		 * Function of specific deleting table
		 */
		public function deleteQuery() {

			global $wpdb;

			$table_name = $wpdb->prefix . 'empdetails';

			if ( isset( $_GET['delete_id'] ) ) {
				$wpdb->delete(
					$table_name,
					array(
						'id' => $_GET['delete_id'],
					)
				);
			}

		}

		/**
		 * values get from the sql and display in input
		 */
		public function update_employee() {

			global $wpdb;
			// die();

			if ( isset( $_POST['update_id'] ) ) {

				$table_name = $wpdb->prefix . 'empdetails';
				$dlt        = $_POST['update_id'];
				$res        = $wpdb->get_results( "SELECT image,id,firstname, lastname,email,designation,dob,gender,skills,city FROM $table_name where id = $dlt" );
				print_r( $res );

				include_once dirname( __DIR__ ) . '/template/class-fetch-data.php';

			}
		}

		/**
		 * Update Values
		 */
		public function data_updating_in_employee_table() {

			global $wpdb;

			$empimage;
			$empfirstname;
			$emplastname;
			$empemail;
			$empdesig;
			$empdob;
			$empgender;
			$empskills;
			$empcity;

			if ( isset( $_POST['empsubmit'] ) && isset( $_GET['update_id'] ) ) {

				$dlt = $_GET['update_id'];

				$table_name = $wpdb->prefix . 'empdetails';

				$wpdb->update(
					$table_name,
					array(

						'image'       => $empfirstname,
						'firstname'   => $empfirstname,
						'lastname'    => $emplastname,
						'email'       => $empemail,
						'designation' => $empdesig,
						'dob'         => $empdob,
						'gender'      => $empgender,
						'skills'      => $empskills,
						'city'        => $empcity,

					),
					array( 'id' => $dlt )
				);

			}
		}


	}

}
new submenu_employee_tab();

