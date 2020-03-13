<?php

$title = 'Gėrimų katalogas';
$h1 = $title;

$produktai = [
    [
        'name' => 'Stumbro Degtinėla',
        'price' => 6.49,
        'image'=> '/assets/images/stumbras.png',
        'in_stock' => [
            'amount' => 50
        ]
    ],
    [
        'name' => 'Žalčio Balzamas',
        'price' => 9.49,
        'price_special' => 7.99,
        'image'=> '/assets/images/balzamas.png',
        'in_stock' => [
            'amount' => 10
        ]
    ],
    [
        'name' => 'Zelionaja Marka',
        'price' => 14.49,
        'image'=> '/assets/images/zelionaja.png',
        'in_stock' => [
            'amount' => 20
        ]
    ],
    [
        'name' => 'Scottish Leader',
        'price' => 16.99,
        'price_special' => 12.49,
        'image'=> '/assets/images/scottish.png',
        'in_stock' => [
            'amount' => 0
        ]
    ]
];

foreach ($produktai as $produkto_id => $produktas) {
    $produktai[$produkto_id]['price_display'] = '€' . $produktas['price'];

    if ($produktas['price_special'] ?? false) {
        $discount = round((($produktas['price'] - $produktas['price_special']) / $produktas['price']) * 100, 0);
        $produktai[$produkto_id]['discount'] = '-' . $discount . '%';
        $produktai[$produkto_id]['price_display'] = '€' . $produktas['price_special'];
    }

    if ($produktas['in_stock']['amount'] > 0) {
        $class_sandelyje = 'yra-sandelyje';
        $text_sandelyje = 'Yra sandėlyje';
    }
    else {
        $class_sandelyje = 'nera-sandelyje';
        $text_sandelyje = 'Nėra sandėlyje';
    }

    //$class_sandelyje = $produktas['in_stock']['amount'] > 0 ? 'yra-sandelyje' : 'nera-sandelyje';
    //$text_sandelyje = $produktas['in_stock']['amount'] > 0 ? 'yra-sandelyje' : 'nera-sandelyje';


    $produktai[$produkto_id]['in_stock']['class'] = $class_sandelyje;
    $produktai[$produkto_id]['in_stock']['text'] = $text_sandelyje;
}

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1><?php print $h1; ?></h1>
    <div class="card-container">
        <?php foreach ($produktai as $produktas) : ?>
            <div class="card">
                <div class="prices">
                    <h3 class="price"><?php print $produktas['price_display']; ?></h3>
                    <?php if ($produktas['price_special'] ?? false) : ?>
                        <h3 class="discount"><?php print $produktas['discount']; ?></h3>
                    <?php endif; ?>
                </div>
                <div class="<?php print $produktas['in_stock']['class']; ?>">
                    <img src="<?php print $produktas['image']; ?>" alt="Product image">
                </div>
                <h2><?php print $produktas['name']; ?></h2>
                <h2 class="<?php print $produktas['in_stock']['class']; ?>">
                    <?php print $produktas['in_stock']['text']; ?>
                </h2>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>