<?php

$form = [
    'attr' => [
        'action' => '/',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ],
    'validators' => [
        "validate_fields_match" => [
            'password',
            'password_repeat'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'failed' => 'form_fail'
    ],
    'fields' => [
        'vardas' => [
            'label' => 'Vardas',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Vardas'
                ]
            ]
        ],
        'last_name' => [
            'label' => 'Last name',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'last-name',
                    'placeholder' => 'Pakartok ką parašei'
                ]
            ]
        ],
        'phone_number' => [
            'label' => 'Telefono numeris:',
            'type' => 'text',
            'value' => '',
            'filter' => '',
            'validators' => [
                'validate_not_empty',
                'validate_phone',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_100',
                'validate_field_range' => [
                    'min' => 18,
                    'max' => 100
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'phone',
                    'placeholder' => '+3706xxxxxxx'
                ]
            ]
        ],
        'x' => [
            'label' => 'Spėk, kokia bus šaknis iš:',
            'type' => 'text',
            'value' => rand(0, 1000),
            'filter' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
            ],
            'extra' => [
                'attr' => [
                    'readonly' => true,
                ]
            ]
        ],
        'y' => [
            'label' => 'Atsakymas:',
            'type' => 'text',
            'value' => '',
            'filter' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'age',
                    'placeholder' => 'Įveskite skaičių'
                ]
            ]
        ],
        'email' => [
            'label' => 'E-mail',
            'type' => 'email',
            'value' => '',
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'email',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 6,
                    'max' => 32
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'password',
                ]
            ]
        ],
        'password_repeat' => [
            'label' => 'Password Repeat',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 6,
                    'max' => 32
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'password-repeat',
                ]
            ]
        ],
        'select' => [
            'label' => 'Veiksmas: ',
            'type' => 'select',
            'value' => 'dalyba',
            'options' => [
                'sudetis' => 'Sudetis',
                'atimtis' => 'Atimtis',
                'daugyba' => 'Daugyba',
                'dalyba' => 'Dalyba'
            ],
            'validators' => [
                'validate_select'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'select'
                ]
            ]
        ],
        'ar_laikai' => [
            'type' => 'radio',
            'headline' => 'Ar laikai kardana ?',
            'value' => '',
            'class' => 'radio',
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
        'ar_pili' => [
            'type' => 'radio',
            'headline' => 'Ar pili į baką ?',
            'value' => '',
            'class' => 'radio',
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
        'ar_rukai' => [
            'type' => 'radio',
            'headline' => 'Ar rūkai žolių arbatą ?',
            'value' => '',
            'class' => 'radio',
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'validators' => [
                'validate_not_empty'
            ]
        ],
    ],
    'buttons' => [
        'action' => [
            'text' => 'Pateikti atsakymus',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

function form_success($form, $safe_input)
{

}
