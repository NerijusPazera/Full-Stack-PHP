<?php

require '../bootloader.php';

$title = 'Log In';

$form = [
    'attr' => [
        'id' => 'login-form'
    ],
    'validators' => [
            'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'email' => [
            'label' => 'E-mail',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_email',
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Log In',
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
    $_SESSION['user_email'] = $safe_input['email'];
    $_SESSION['user_password'] = $safe_input['password'];

    header("Location: /index.php");

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

