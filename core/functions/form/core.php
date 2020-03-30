<?php

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
 * @param array $form
 * @param array $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($safe_input as $field_id => $field_value) {
        $field = &$form['fields'][$field_id];
        $field['value'] = $field_value;

        foreach ($field['validators'] ?? [] as $validator_id => $validator) {
            if (!is_array($validator)) {
                if (!$validator($field_value, $field)) {
                    $success = false;
                    break;
                }
            } else {
                $validator = $validator_id($field_value, $field, $validator);

                if (!$validator) {
                    $success = false;
                    break;
                }
            }

        }

    }

    if (isset ($form['callbacks']['success']) && $success) {
        $form['callbacks']['success']($form, $safe_input);
    } elseif (isset($form['callbacks']['failed']) && !$success) {
        $form['callbacks']['failed']($form, $safe_input);
    }

    return $success;
}
