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
        $field['error'] = 'Įveskite skaičių !';

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
 * F-cija tikrinanti ar skaicius yra tinkamame rezyje
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

/**
 * F-cija tikrinanti ar nurodyti laukeliai sutampa
 * @param array $filtered_input isfiltruotas $_POST masyvas
 * @param array $form
 * @param array $params
 * @return bool
 */
function validate_fields_match(array $filtered_input, array &$form, array $params): bool
{
    $comparision_field_id = $params[0];
    $comparision = $filtered_input[$comparision_field_id];

    foreach ($params as $param_id => $param) {
        if ($comparision !== $filtered_input[$param]) {
            $form['error'] = 'Laukeliai nesutampa !';

            return false;
        }
    }

    return true;
}

/**
 * F-cija tikrinanti ar tekstas yra tinkamo ilgio
 * @param $field_input
 * @param array $field
 * @param $params
 * @return bool
 */
function validate_text_length($field_input, array &$field, array $params): bool
{
    $text_length = strlen($field_input);

    if ($text_length < $params['min'] || $text_length > $params['max']) {
        $field['error'] = strtr('Žodis turi buti ilgesnis nei @min ir trumpesnis nei @max simbolių', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);

        return false;
    }

    return true;
}

/**
 * F-cija tikrinanti ar email tinkamo formato
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_email($field_input, array &$field): bool
{
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

    if (!preg_match($pattern, $field_input)) {
        $field['error'] = 'El paštas netinkamo formato !';

        return false;
    }

    return true;

}

/**
 * F-cija tikrinanti ar vartotojas tokiu email nebuvo registruotas anksciau
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_email_unique($field_input, array &$field): bool
{
    $database = App\App::$db->getData();

    foreach ($database['users'] as $user) {
        if ($user['email'] == $field_input) {
            $field['error'] = 'Vartotojas tokiu el-paštu jau registruotas !';

            return false;
        }
    }

    return true;
}

/**
 * F-cija tikrinanti ar toks vartotojas yra registruotas
 * @param array $filtered_input
 * @param $form
 * @return bool
 */
function validate_login(array $filtered_input, &$form): bool
{

    if (isset($filtered_input['email'])) {
        if (!App\App::$db->getRowsWhere('users', ['email' => $filtered_input['email'], 'password' => $filtered_input['password']])) {
            $form['error'] = 'Toks vartotojas neregistruotas, arba blogai įvestas slaptažodis !';

            return false;
        }
    }

    return true;
}

