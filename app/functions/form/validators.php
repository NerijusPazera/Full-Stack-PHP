<?php

/**
 * Ptikrina ar pasirinkimas egzistuoja $field masyve
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_select($field_input, array &$field): bool
{
    if (!isset($field['options'][$field_input])) {
        $field['error'] = 'Nėra tokio pasirinkimo !';

        return false;
    }

    return true;
}

/**
 * F-cija tikrinanti ar tokiu pavadinimu komanda jau nera registruota.
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_team($field_input, array &$field): bool
{
    $teams = file_to_array(TEAMS) ?: [];

    foreach ($teams as $team) {
        if ($team['team_name'] == $field_input) {
            $field['error'] = 'Komanda tokiu pavadinimu jau registruota !';

            return false;
        }
    }

    return true;
}

/**
 * F-cija tikrinanti ar telefono numeris tinkamo formato
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_phone($field_input, array &$field): bool
{
    $pattern = "/\+3706[0-9]{7}$/";

    if (!preg_match($pattern, $field_input)) {
        $field['error'] = 'Telefono numeris netinkamao formato !';

        return false;
    }

    return true;
}
