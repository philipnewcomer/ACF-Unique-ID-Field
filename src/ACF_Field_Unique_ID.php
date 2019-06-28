<?php

namespace PhilipNewcomer\ACF_Unique_ID_Field;

use acf_field;

class ACF_Field_Unique_ID extends acf_field {

	/**
	 * Initialize the class.
	 */
	public static function init() {
		add_action(
			'acf/include_field_types',
			function() {
				if ( ! class_exists( 'acf_field' ) ) {
					return;
				}

				new static();
			}
		);
	}

	/**
	 * Initializes the field.
	 */
	public function __construct() {
		$this->name     = 'unique_id';
		$this->label    = 'Unique ID';
		$this->category = 'basic';

		parent::__construct();
	}

	/**
	 * Renders the HTML field.
	 *
	 * @param array $field The field data.
	 */
	public function render_field( $field ) {
		printf( '<input type="text" name="%s" value="%s" readonly>',
			esc_attr( $field['name'] ),
			esc_attr( $field['value'] )
		);
	}

	/**
	 * Define the unique ID if one does not already exist.
	 *
	 * @internal This filter is applied to the value before it is saved to the database.
	 *
	 * @param string $value   The field value.
	 * @param int    $post_id The post ID.
	 * @param array  $field   The field data.
	 *
	 * @return string The filtered value.
	 */
	public function update_value( $value, $post_id, $field ) {

		if ( ! empty( $value ) ) {
			return $value;
		}

		return uniqid();
	}
}
