<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'id' => 'login-form',
                'class' => 'reg-login-form'
            ],
            'validators' => [
                'validate_login'
            ],
            'fields' => [
                'email' => [
                    'label' => 'E-mail',
                    'type' => 'email',
                    'validators' => [
                        'validate_not_empty',
                        'validate_email',
                    ]
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'validators' => [
                        'validate_not_empty',
                    ],
                ]
            ],
            'buttons' => [
                'login_btn' => [
                    'text' => 'Prisijungti',
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