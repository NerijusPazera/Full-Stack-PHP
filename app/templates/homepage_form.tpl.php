<?php

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'pixel-form',
        'id' => 'login-form'
    ],
    'validators' => [
        'validate_pixel_unique'
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'x' => [
            'label' => 'X koordinates',
            'type' => 'number',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 1000
                ]
            ],
            'extra' => [
                'attr' => [
                ]
            ]
        ],
        'y' => [
            'label' => 'Y koordinates',
            'type' => 'number',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 600
                ]
            ],
            'extra' => [
                'attr' => [
                ]
            ]
        ],
        'color' => [
            'label' => 'Pasirinkite spalva',
            'type' => 'color',
            'value' => '#000000',
            'validators' => [
            ],
            'extra' => [
                'attr' => [
                    'class' => 'color-picker'
                ]
            ]
        ],
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Pirkti pixeli',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];
