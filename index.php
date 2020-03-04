<?php

$title = 'Alaus skaičiuoklė';
$money = rand(0, 30);
$bokal_cost = 3;
$bokal = 1;
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <style>
        h1 {
            color: green;
            margin-right: 30px;
        }
        div {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <?php for (; $money >= $bokal_cost; $money -= $bokal_cost, $bokal++) : ?>
        <div>
            <h1><?php print $bokal * $bokal_cost; ?> &euro;</h1>
            <?php for ($x = 0; $x < $bokal; $x++) : ?>
                <img src="https://www.stickpng.com/assets/images/580b57fbd9996e24bc43c099.png" width="130px" alt="beer">
            <?php endfor; ?>
        </div>
    <?php endfor; ?>
</body>
</html>