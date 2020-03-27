<?php

/**
 * F-ija generuojanti formos atributus
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";
    }

    return $attributes;
}

/**
 * F-cija filtruojanti formos inputus
 * @param array $form
 * @return array|null
 */
function get_filtered_inputs(array $form): ?array
{
    $filter_params = [];

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['filter'])) {
            $filter_params[$field_id] = $field['filter'];
        } else {
            $filter_params[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }

    return filter_input_array(INPUT_POST, $filter_params);
}

/**
 * F-cija tikrinanti ar teisingai uzpildyta forma
 * @param $form
 * @param $safe_input
 */
function validate_form(array &$form, array $safe_input): void
{
    foreach ($safe_input as $field_id => $field_value) {
        foreach ($form['fields'][$field_id]['validators'] as $validator) {
            $validator($field_value, $form['fields'][$field_id]);
        }
        $form['fields'][$field_id]['value'] = $field_value;
    }
}

/**
 * F-cija tikrinanti ar laukelis nera tuscias
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_not_empty($field_input, array &$field): bool
{
    if (empty($field_input)) {
        $field['error'] = 'Laukelis negali būti tuščias !';
        return false;
    }

    return true;
}