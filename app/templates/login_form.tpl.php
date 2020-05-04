<?php

$form = [
    'attr' => [
        'id' => 'login-form'
    ],
    'validators' => [
        'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'email' => [
            'label' => 'E-mail',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_email',
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Log In',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],

    ]
];
