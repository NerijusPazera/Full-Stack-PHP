<?php

namespace App\Views\Forms\Catalog;

use Core\Views\Form;

class AddToCartForm extends Form
{
    public function __construct($id, array $form = [])
    {
        $form += [
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'drink_id' => [
                    'value' => $id,
                    'type' => 'hidden',
                ]
            ],
            'buttons' => [
                'add_to_cart' => [
                    'text' => 'Į KREPŠĮ',
                    'extra' => [
                        'attr' => [
                            'class' => 'add-to-cart',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}