<?php

$title = 'Masyvai';

$game = [
    'time' => '12:08',
    'player' => [
        'armor' => 90,
        'health' => 100,
        'wanted_level' => 2,
        'cash' => 3718892,
        'position' => [
            'x' => 100.123123,
            'y' => 57.312313,
            'z' => 5.212134
        ],
        'weapons' => [
            'active_id' => 0,
            'available' => [
                [
                    'name' => 'Dildo',
                    'damage' => 30,
                    'icon' => '....',
                    'type' => 'meelee',
                ],
                [
                    'name' => 'Uzi',
                    'damage' => 70,
                    'icon' => '....',
                    'type' => 'firearm',
                    'ammo' => [
                        'magazine_size' => 150,
                        'in_magazine' => 40,
                        'total' => 900,
                    ]
                ]
            ]
        ],
        'clothes' => [
            'top' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'T-shirt',
                        'model' => '....',
                    ]
                ]
            ],
            'bottom' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'Jeans',
                        'model' => '....',
                    ]
                ]
            ]
        ]
    ]
];

$game['time'] = date('G:i');

//$active_id = $game['player']['weapons']['active_id'];
//unset($game['player']['weapons']['available'][$active_id]);
//
//$keys = array_keys($game['player']['weapons']['available']);
//$game['player']['weapons']['active_id'] = $keys[0];
//
//$new_active_id = array_key_first($game['player']['weapons']['available']);
//$game['player']['weapons']['active_id'] = $new_active_id;
//
$game['player']['weapons']['available'][] = [
    'name' => 'Spray-can',
    'damage' => 10,
    'icon' => '....',
    'type' => 'meelee',
    'ammo' => [
        'magazine_size' => 999,
        'in_magazine' => 900,
        'total' => 900,
    ]
];

var_dump($game);

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <style>
    </style>
</head>
<body>
</body>
</html>