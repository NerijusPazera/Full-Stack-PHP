<?php

$title = 'Masyvai';

$array = [
    [
        'vardas' => 'Petras',
        'pavarde' => 'Lizius',
        'daiktai' => [
            [
                'pavadinimas' => 'Toyota Prius',
                'kiekis' => 1
            ]
        ]
    ],
    [
        'vardas' => 'Ona',
        'pavarde' => 'Lazauskiene',
        'daiktai' => [
            [
                'pavadinimas' => 'Malkos',
                'kiekis' => 3
            ]
        ]
    ],
    [
        'vardas' => 'Algirdas',
        'pavarde' => 'Pautinskas',
        'daiktai' => [
            [
                'pavadinimas' => 'Karve',
                'kiekis' => 10
            ]
        ]
    ]
];

var_dump($array);

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