<?php

include "core/functions/form/form_functions.php";

$title = 'Formos';

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name',
            'type' => 'text',
            'value' => '',
            'validators' => [
                    'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                ]
            ]
        ],
        'last_name' => [
            'label' => 'Last name',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'last-name',
                ]
            ]
        ],
        'age' => [
            'label' => 'Age',
            'type' => 'number',
            'value' => '',
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'age',
                ]
            ]
        ],
        'email' => [
            'label' => 'E-mail',
            'type' => 'email',
            'value' => '',
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'email',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'password',
                ]
            ]
        ],
//        'select' => [
//            'extra' => [
//                'attr' => [
//                    'class' => 'select',
//                ]
//            ]
//        ],
//        'option' => [
//            'value' => '',
//            'extra' => [
//                'attr' => [
//                    'class' => 'option'
//                ]
//            ]
//        ]
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Send',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ]
    ]

];

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

var_dump($safe_input);

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
</style>
<body>
<main>
    <?php include 'templates/form.tpl.php'; ?>
</main>
</html>