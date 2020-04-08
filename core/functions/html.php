<?php

/**
 * F-ija generuojanti html atributus
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
 * F-cija generuojanti radio atributus
 * @param array $field
 * @param $field_id
 * @param $option_id
 * @return string
 */
function radio_attr(array $field, $field_id, $option_id)
{
    $attr = [
        'name' => $field_id,
        'type' => $field['type'],
        'value' => $option_id,
        'class' => $field['class']
    ];

    if ($option_id == ($field['value']) ?? null){
        $attr['checked'] = true;
    }

    return html_attr($attr);
}