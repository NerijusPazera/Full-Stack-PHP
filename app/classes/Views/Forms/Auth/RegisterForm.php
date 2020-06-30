<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'id' => 'register-form',
                'class' => 'reg-login-form'
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'fields' => [
                'username' => [
                    'label' => 'Slapyvardis',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
                'surname' => [
                    'label' => 'Pavardė',
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
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Pakartokite slaptažodį',
                    'type' => 'password',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
            ],
            'buttons' => [
                'register_btn' => [
                    'text' => 'Registruotis',
                    'extra' => [
                        'attr' => [
                            'class' => 'action-button',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}