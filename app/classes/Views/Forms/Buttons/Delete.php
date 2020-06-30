<?php

namespace App\Views\Forms\Buttons;

use Core\Views\Form;

class Delete extends Form
{
    public function __construct($id, array $form = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'id' => 'delete-btn'
            ],
            'fields' => [
                'id' => [
                    'value' => $id,
                    'type' => 'hidden'
                ]
            ],
            'buttons' => [
                'delete_drink' => [
                    'text' => 'Trinti',
                    'extra' => [
                        'attr' => [
                            'class' => 'delete-btn',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}