<?php

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

/**
 * F-cija tikrinanti ar i laukeli ivesta skaicius
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_is_number($field_input, array &$field): bool
{
    if (!is_numeric($field_input)) {
        $field['error'] = 'Amžių nurodykite skaitmenimis !';

        return false;
    }

    return true;
}

/**
 * F-cija tikrinanti ar ivestas skaicius yra teigiamas
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_is_positive($field_input, array &$field): bool
{
    if ($field_input < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių !';

        return false;
    }

    return true;
}

/**
 * F-cija tikrinanti ar ivestas skaicius mazesnis nei 100
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_max_100($field_input, array &$field): bool
{
    if ($field_input > 100) {
        $field['error'] = 'Įveskite skaičių mažesnį nei 100 !';

        return false;
    }

    return true;
}

function form_success($form, $safe_input)
{
    var_dump('Gal ir normalus !');
}

function form_fail($form, $safe_input)
{
    var_dump('Nenormalus !');
}

/**
 * F-cija tikrinanti ar tarp zodziu yra tarpas
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_has_space($field_input, array &$field): bool
{
    if ($field_input == trim($field_input) && strpos($field_input, ' ') == false) {
        $field['error'] = 'Tarp vardo ir pavardės nėra tarpo !';

        return false;
    }

    return true;
}

/**
 * F-cija tikrinanti ar skaicius yra tarp 18 ir 100
 * @param $field_input
 * @param array $field
 * @param $params
 * @return bool
 */
function validate_field_range($field_input, array &$field, array $params): bool
{
    if ($field_input < $params['min'] || $field_input > $params['max']) {
        $field['error'] = strtr('Skaicius turi buti daugiau nei @min ir mažiau nei @max', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);

        return false;
    }

    return true;
}