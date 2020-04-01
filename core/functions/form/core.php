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
 * sukuria laukialaims/formai errorus
 * @param array $form
 * @param array $safe_input isfiltruotas $_POST masyvas
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($form['fields'] as $field_id => &$field) {
        $field['value'] = $safe_input[$field_id];

        foreach ($field['validators'] ?? [] as $validator_id => $field_validator) {
            if (!is_array($field_validator)) {
                if (!$field_validator($field['value'], $field)) {
                    $success = false;
                    break;
                }
            } else {
                $validator_function = $validator_id;
                $validator_params = $field_validator;
                $validator = $validator_function($field['value'], $field, $validator_params);

                if (!$validator) {
                    $success = false;
                    break;
                }
            }

        }

    }
    if ($success) {
        foreach ($form['validators'] ?? [] as $validator_id => $form_validator) {
            if (!is_array($form_validator)) {
                $validator_function = $form_validator;
                $validator = $validator_function($safe_input, $form);
            } else {
                $validator_function = $validator_id;
                $validator_params = $form_validator;
                $validator = $validator_function($safe_input, $form, $validator_params);
            }

            if (!$validator) {
                $success = false;
                break;
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