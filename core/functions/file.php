<?php

/**
 * F-cija irasanti masyvo duomenis i faila
 * @param array $array
 * @param $file
 * @return bool
 */
function array_to_file(array $array, string $file): bool
{
    $string = json_encode($array);
    $bytes_written = file_put_contents($file, $string);

    if ($bytes_written !== false) {
        return true;
    }
}
