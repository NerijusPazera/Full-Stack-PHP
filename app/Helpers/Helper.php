<?php

if (!function_exists('html_attr')) {
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
}

if (!function_exists('radio_attr')) {
    /**
     * F-cija generuojanti radio atributus
     * @param array $field
     * @param $field_id
     * @param $option_id
     * @return string
     */
    function radio_attr(array $field, $field_id, $option_id)
    {
        $attr = $field['extra']['attr'] ?? [];

        $attr += [
            'name' => $field_id,
            'type' => $field['type'],
            'value' => $option_id,
            'class' => $field['class']
        ];

        if ($option_id == ($field['value']) ?? null) {
            $attr['checked'] = true;
        }

        return html_attr($attr);
    }
}

if (!function_exists('input_attr')) {
    /**
     * F-cija generuojanti input atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function input_attr($field_id, array $field): string
    {
        $attr = $field['extra']['attr'] ?? [];

        $attr += [
            'type' => $field['type'],
            'name' => $field_id,
            'value' => $field['value'] ?? ''
        ];

        return html_attr($attr);
    }
}

if (!function_exists('select_attr')) {
    /**
     * F-cija generuojanti select atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function select_attr($field_id, array $field): string
    {
        $attr = $field['extra']['attr'] ?? [];

        if (isset($field['extra']['attr']['multiple'])) {
            $attr += [
                'name' => $field_id . '[]',
            ];
        } else {
            $attr += [
                'name' => $field_id,
            ];
        }

        return html_attr($attr);
    }
}

if (!function_exists('option_attr')) {
    /**
     * F-cija generuojanti option atributus
     * @param $option_id
     * @param $field
     * @return string
     */
    function option_attr($option_id, $field): string
    {
        $attr = [
            'value' => $option_id,
        ];

        if (is_array($field['value'])) {
            foreach ($field['value'] as $value) {
                if ($value == $option_id) {
                    $attr['selected'] = true;
                }
            }
        } elseif ($field['value'] == $option_id) {
            $attr['selected'] = true;
        }

        return html_attr($attr);
    }
}

if (!function_exists('textarea_attr')) {
    /**
     * F-cija generuojanti textarea atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function textarea_attr($field_id, array $field): string
    {
        $attr = $field['extra']['attr'] ?? [];

        $attr += [
            'name' => $field_id,
        ];

        return html_attr($attr);
    }
}
