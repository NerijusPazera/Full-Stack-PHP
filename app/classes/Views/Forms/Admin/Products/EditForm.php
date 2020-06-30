<?php

namespace App\Views\Forms\Admin\Products;

use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form = [])
    {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            if (strlen($id) > 0) {
                $drink = \App\Drinks\Model::get((int) $id);
            }
        }

        if (!($drink ?? null)) {
            header("Location: /admin/view");
        }

        $form = [
            'attr' => [
                'method' => 'POST',
                'id' => 'edit-drink-form',
                'class' => 'add-edit-drink-form'
            ],
            'validators' => [
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => $drink->getId()
                ],
                'drink_name' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => $drink->getDrinkName(),
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
                    'value' => $drink->getAlkVol(),
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
                    'value' => $drink->getCapacity(),
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
                    'value' => $drink->getInStock(),
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
                    'type' => 'text',
                    'value' => $drink->getPrice(),
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_is_positive',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 14.99'
                        ]
                    ]
                ],
                'photo' => [
                    'label' => 'Nuotrauka (URL)',
                    'type' => 'text',
                    'value' => $drink->getPhoto(),
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
                'edit_drink' => [
                    'text' => 'Atnaujinti',
                    'extra' => [
                        'attr' => [
                            'class' => 'edit-btn',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}