<?php

namespace App\Views\Forms\Buttons;

use Core\Views\Form;

class Order extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [],
            'buttons' => [
                'order' => [
                    'text' => 'UŽSAKYTI',
                    'extra' => [
                        'attr' => [
                            'class' => 'order-btn',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}