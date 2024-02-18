<?php

/**
 * Version: 3.0.0
 */

namespace PhilipNewcomer\ACF_Unique_ID_Field;

use acf_field;

if (!defined('ABSPATH')) {
    exit();
}

class ACF_Field_Unique_ID extends acf_field {
    /**
     * Controls field type visibilty in REST requests.
     *
     * @var bool
     */
    public $show_in_rest = true;

    /**
     * Initialize the class.
     */
    public static function init() {
        /**
         * Registers the ACF field type.
         */

        add_action('init', function () {
            if (!function_exists('acf_register_field_type')) {
                return;
            }

            acf_register_field_type(new static());
        });
    }

    /**
     * Initialize the field.
     */
    public function __construct() {
        $this->name = 'unique_id';
        $this->label = 'Unique ID';
        $this->category = 'basic';

        parent::__construct();
    }

    /**
     * Render the HTML field.
     *
     * @param array $field The field data.
     */
    public function render_field($field) {
        // Debug
        // printf('<code>%s</code>', var_dump($field));

        // Check if the 'hide_on_post_edit' setting is true
        if (!empty($field['hide_on_post_edit'])) {
            printf(
                '<style scoped>.acf-field-%s{display:none;}</style>',
                explode('_', $field['key'])[1],
            );
            return;
        }

        printf(
            '<input type="text" name="%s" value="%s" readonly>',
            esc_attr($field['name']),
            esc_attr($field['value']),
        );
    }

    /**
     * Settings to display when users configure a field of this type.
     *
     * These settings appear on the ACF “Edit Field Group” admin page when
     * setting up the field.
     *
     * @param array $field
     * @return void
     */
    public function render_field_settings($field) {
        /*
         * Repeat for each setting you wish to display for this field type.
         */
        acf_render_field_setting($field, [
            'label' => 'Hide on post edit',
            'instructions' =>
                'Check this box to hide the field when editing a post.',
            'type' => 'true_false',
            'name' => 'hide_on_post_edit',
            'ui' => 1,
        ]);

        // To render field settings on other tabs in ACF 6.0+:
        // https://www.advancedcustomfields.com/resources/adding-custom-settings-fields/#moving-field-setting
    }

    /**
     * Define the unique ID if one does not already exist.
     *
     * @param string $value   The field value.
     * @param int    $post_id The post ID.
     * @param array  $field   The field data.
     *
     * @return string The filtered value.
     */
    public function update_value($value, $post_id, $field) {
        if (!empty($value)) {
            return $value;
        }

        return uniqid();
    }
}
