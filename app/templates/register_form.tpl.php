<?php

$form = [
    'attr' => [
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
    ],
    'fields' => [
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'email' => [
            'label' => 'E-mail',
            'type' => 'email',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_email',
                'validate_email_unique'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'password_repeat' => [
            'label' => 'Password Repeat',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Register',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];
