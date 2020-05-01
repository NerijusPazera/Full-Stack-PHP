<?php

require '../bootloader.php';

$title = 'Home page';
$user = \App\App::$session->getUser();

function form_success($form, $safe_input)
{
    $pixel = new \App\Pixels\Pixel($safe_input + ['email' => $_SESSION['user_email']]);

    App\App::$db->insertRow('pixels', $pixel->_getData());
    header("Location: /index.php");
}

$database = \App\App::$db->getData();

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'pixel-form',
        'id' => 'login-form'
    ],
    'validators' => [
        'validate_pixel_unique'
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'x' => [
            'label' => 'X koordinates',
            'type' => 'number',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 1000
                ]
            ],
            'extra' => [
                'attr' => [
                ]
            ]
        ],
        'y' => [
            'label' => 'Y koordinates',
            'type' => 'number',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 600
                ]
            ],
            'extra' => [
                'attr' => [
                ]
            ]
        ],
        'color' => [
            'label' => 'Pasirinkite spalva',
            'type' => 'color',
            'value' => '#000000',
            'validators' => [
            ],
            'extra' => [
                'attr' => [
                    'class' => 'color-picker'
                ]
            ]
        ],
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Pirkti pixeli',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];

if ($user) {
    $h1 = 'Sveikas ' . $user->getUsername() . '!';
    unset($nav['buttons']['login'], $nav['buttons']['register']);
} else {
    $h1 = 'Esate neprisijungęs !';
    unset($nav['buttons']['logout']);
    unset($form);
}

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include ROOT . '/core/templates/nav.tpl.php'; ?>
<main>
    <h1><?php print $h1; ?></h1>
    <?php include ROOT . '/core/templates/form.tpl.php'; ?>
    <div class="pixels-container">
        <?php foreach ($database['pixels'] as $pixel) : ?>
            <span class="pixel" style="background-color: <?php print $pixel['color']; ?>;
                    top: <?php print $pixel['y']; ?>px; left: <?php print $pixel['x']; ?>px;"></span>
        <?php endforeach; ?>
    </div>
</main>
</html>
