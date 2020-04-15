<?php

require 'bootloader.php';

/**
 * F-cija tikrinanti ar zaidejas tokiu vardu nebuvo registruotas anksciau
 * @param $safe_input
 * @param array $form
 * @return bool
 */
function validate_player($safe_input, array &$form): bool
{
    $teams = file_to_array(TEAMS);
    $team = $teams[$safe_input['team_select']];

    foreach ($team['players'] as $player) {
        if ($player['nickname'] == $safe_input['nickname']) {
            $form['error'] = 'Žaidėjas tokiu vardu jau registruotas !';

            return false;
        }
    }

    return true;
}

function form_success($form, $safe_input)
{
    $teams = file_to_array(TEAMS) ?: [];

    $teams[$safe_input['team_select']]['players'][] =
        [
            'nickname' => $safe_input['nickname'],
            'score' => 0
        ];

    array_to_file($teams, TEAMS);

    $player_info = [];
    foreach ($safe_input as $input_id => $input) {
        $player_info[$input_id] = $input;
    }

    $string = json_encode($player_info);
    setcookie('player_info', $string, strtotime('+1 year'));
}

$title = 'Join team';

$form = [
    'callbacks' => [
        'success' => 'form_success',
    ],
    'validators' => [
        'validate_player'
    ],
    'fields' => [
        'team_select' => [
            'label' => 'Pasirinkite komanda: ',
            'type' => 'select',
            'value' => '',
            'options' => [],
            'validators' => [
                'validate_select'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'select'
                ]
            ]
        ],
        'nickname' => [
            'label' => 'Nickname',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Nickname'
                ]
            ]
        ],
    ],
    'buttons' => [
        'action' => [
            'text' => 'Join',
            'extra' => [
                'attr' => [
                    'class' => 'action-button',
                ]
            ]
        ],
    ]
];

$teams = file_to_array(TEAMS) ?: [];
foreach ($teams as $team_id => $team) {
    $form['fields']['team_select']['options'][$team_id] = $team['team_name'];
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
    <link rel="stylesheet" href="app/assets/css/style.css">
</head>
<body>
<?php include 'core/templates/nav.php'; ?>
<main>
    <?php include 'core/templates/form.tpl.php'; ?>
</main>
</html>


