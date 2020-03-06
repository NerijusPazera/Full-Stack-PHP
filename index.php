<?php

$title = 'Foreach ciklas';

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
    ],
    'objects' => [
        [
            'x' => 300,
            'y' => 400,
            'class' => 'car'
        ],
        [
            'x' => 500,
            'y' => 200,
            'class' => 'ballas'
        ],
    ]
];

foreach ($game['objects'] as $key => $object) {
    $game['objects'][$key]['on_fire'] = rand(0, 1);
}

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <style>
        body {
            background-image: url("assets/images/image.png");
            background-size: cover;
            background-position: center;
            position: relative;
        }

        div {
            background-size: cover;
            position: absolute;
        }

        .fire {
            background-image: url("https://clipartart.com/images/fireball-gif-clipart-3.gif");
            height: 100px;
            width: 100px;
            position: absolute;
        }

        .pointer {
            background-image: url("assets/images/pointer.png");
            height: 50px;
            width: 30px;
        }

        .car {
            background-image: url("assets/images/car.png");
            height: 100px;
            width: 210px;
        }

        .car .fire {
            left: 45%;
            bottom: 40%;
        }
        .car .pointer {
            
        }

        .ballas {
            background-image: url("assets/images/ballas.png");
            height: 100px;
            width: 100px;
        }

        .ballas .fire {
            left: 10%;
        }
    </style>
</head>
<body>
<?php foreach ($game['objects'] as $object) : ?>
    <div class="<?php print $object['class']; ?>"
         style="top:<?php print $object['x']; ?>px; left:<?php print $object['y']; ?>px">
        <?php if ($object['on_fire']): ?>
            <div class="fire"></div>
        <?php endif; ?>
        <?php if (!$object['on_fire']) : ?>
            <div class="pointer"></div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</body>
</html>