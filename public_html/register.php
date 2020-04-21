<?php

require '../bootloader.php';

$title = 'Register';

$form = [
    'attr' => [
        'id' => 'login-form'
    ],
    'validators' => [
        "validate_fields_match" => [
            'password',
            'password_repeat'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'username' => [
            'label' => 'Username',
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
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'password_repeat' => [
            'label' => 'Password Repeat',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Register',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

function form_success($form, $safe_input)
{
    $data = file_to_array(USERS) ?: [];

    $data[] = [
        'username' => $safe_input['username'],
        'email' => $safe_input['email'],
        'password' => $safe_input['password'],
    ];

    array_to_file($data, USERS);

    header("Location: /login.php");
}

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include '../core/templates/nav.php'; ?>
<main>
    <?php include '../core/templates/form.tpl.php'; ?>
</main>
</html>
