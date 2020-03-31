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