<?php

require 'bootloader.php';

function form_success($form, $safe_input)
{

}

$title = 'PLAY !';

$form = [
    'callbacks' => [
        'success' => 'form_success',
    ],
    'validators' => [
        'validate_player'
    ],
    'buttons' => [
        'action' => [
            'text' => 'Kick The Ball',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];

$player_info = json_decode($_COOKIE['player_info'], true);
$player_nickname = $player_info['nickname'];
$h1 ="Go for it $player_nickname";

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="app/assets/css/style.css">
</head>
<body>
<?php include 'core/templates/nav.php'; ?>
<main>
    <h1><?php print $h1; ?></h1>
    <?php include 'core/templates/form.tpl.php'; ?>
</main>
</html>

