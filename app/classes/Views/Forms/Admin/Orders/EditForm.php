<?php

namespace App\Views\Forms\Admin\Orders;

use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form = [])
    {
        $id = $_GET['id'] ?? null;
        $order = \App\Cart\Orders\Model::get((int) $id);

        $form = [
            'attr' => [
                'method' => 'POST',
                'id' => 'admin-order-status'
            ],
            'validators' => [
            ],
            'fields' => [
                'order_id' => [
                    'type' => 'hidden',
                    'value' => $order->getId()
                ],
                'select' => [
                    'label' => 'Būklė',
                    'type' => 'select',
                    'value' => $order->getStatus(),
                    'options' => [
                        \App\Cart\Orders\Order::STATUS_SUBMITTED => 'Pateikta',
                        \App\Cart\Orders\Order::STATUS_SHIPPED => 'Išsiųsta',
                        \App\Cart\Orders\Order::STATUS_DELIVERED => 'Pristatyta',
                        \App\Cart\Orders\Order::STATUS_CANCELED => 'Atšaukta'
                    ],
                    'validators' => [
                        'validate_select'
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'status-select'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'action' => [
                    'text' => 'Išsaugoti',
                    'extra' => [
                        'attr' => [
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}