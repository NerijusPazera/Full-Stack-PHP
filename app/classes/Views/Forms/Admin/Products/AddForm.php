<?php

namespace App\Views\Forms\Admin\Products;

use Core\Views\Form;

class AddForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'id' => 'add-drink-form',
                'class' => 'add-edit-drink-form'
            ],
            'validators' => [
            ],
            'fields' => [
                'drink_name' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: Lithuanica'
                        ]
                    ]
                ],
                'alk_vol' => [
                    'label' => 'Laipsniai',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_is_positive',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 40'
                        ]
                    ]
                ],
                'capacity' => [
                    'label' => 'Tūris (ml)',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_is_positive',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: 700'
                        ]
                    ]
                ],
                'in_stock' => [
                    'label' => 'Kiekis sandėlyje',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_is_positive',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 10'
                        ]
                    ]
                ],
                'price' => [
                    'label' => 'Kaina (EUR)',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_is_positive',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 14.99',
                            'step' => 'any'
                        ]
                    ]
                ],
                'photo' => [
                    'label' => 'Nuotrauka (URL)',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: http://.....'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'add_drink' => [
                    'text' => 'Sukurti',
                    'extra' => [
                        'attr' => [
                            'class' => 'add-btn',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}