<?php

require 'bootloader.php';

function form_success($form, $safe_input)
{
    $teams = file_to_array(TEAMS) ?: [];

    $teams[] = [
        'team_name' => $safe_input['team_name'],
        'players' => []
    ];

    array_to_file($teams, TEAMS);
}


$title = 'Create team';

$form = [
    'attr' => [
        'class' => 'team-form',
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'team_name' => [
            'label' => '',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
                'validate_team'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Team name'
                ]
            ]
        ],
    ],
    'buttons' => [
        'action' => [
            'name' => 'action',
            'text' => 'Create',
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
    <?php include 'core/templates/form.tpl.php'; ?>
</main>
</html>
