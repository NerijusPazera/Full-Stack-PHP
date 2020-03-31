<?php

require 'bootloader.php';

$title = 'Formos';

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ],
    'fields' => [
//        'first_name' => [
//            'label' => 'First name',
//            'type' => 'text',
//            'value' => '',
//            'validators' => [
//                'validate_not_empty',
//                'validate_has_space'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'first-name',
//                    'placeholder' => 'Vardas ir pavardė'
//                ]
//            ]
//        ],
//        'last_name' => [
//            'label' => 'Last name',
//            'type' => 'text',
//            'value' => '',
//            'validators' => [
//                'validate_not_empty'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'last-name',
//                ]
//            ]
//        ],
        'x' => [
            'label' => 'X:',
            'type' => 'text',
            'value' => '',
            'filter' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
//                'validate_is_positive',
//                'validate_max_100',
//                'validate_field_range' => [
//                    'min' => 18,
//                    'max' => 100
//                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'age',
                    'placeholder' => 'Įveskite skaičių'
                ]
            ]
        ],
        'y' => [
            'label' => 'Y:',
            'type' => 'text',
            'value' => '',
            'filter' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
//                'validate_is_positive',
//                'validate_max_100',
//                'validate_field_range' => [
//                    'min' => 18,
//                    'max' => 100
//                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'age',
                    'placeholder' => 'Įveskite skaičių'
                ]
            ]
        ],
//        'email' => [
//            'label' => 'E-mail',
//            'type' => 'email',
//            'value' => '',
//            'validators' => [
//                'validate_not_empty'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'email',
//                ]
//            ]
//        ],
//        'password' => [
//            'label' => 'Password',
//            'type' => 'password',
//            'value' => '',
//            'validators' => [
//                'validate_not_empty'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'password',
//                ]
//            ]
//        ],
        'veiksmas' => [
            'label' => 'Veiksmas: ',
            'type' => 'select',
            'value' => 'sudetis',
            'options' => [
                'sudetis' => 'Sudetis',
                'atimtis' => 'Atimtis',
                'daugyba' => 'Daugyba',
                'dalyba' => 'Dalyba'
            ],
            'validators' => [
                'validate_select'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'select'
                ]
            ]
        ]
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Važiuojam',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'failed' => 'form_fail'
    ],
];

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

var_dump($safe_input ?? []);
//var_dump($form['fields']);

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="app/assets/css/style.css">
</head>
<style>
</style>
<body>
<main>
    <?php include 'core/templates/form.tpl.php'; ?>
</main>
</html>