<?php

namespace PhilipNewcomer\ACF_Unique_ID_Field;

class ACF_Field_Unique_ID extends \acf_field {

	/**
	 * Initializes the field.
	 */
	function __construct() {
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
	function render_field( $field ) {
		$value = $field['value'] ? $field['value'] : uniqid();
		printf( '%s',
		       $value
		);
		printf( '<input type="hidden" name="%s" value="%s" readonly>',
			esc_attr( $field['name'] ),
			esc_attr( $value )
		);
	}
}
