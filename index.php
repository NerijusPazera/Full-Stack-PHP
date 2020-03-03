<?php

$title = 'Alaus skaičiuoklė';
$money = rand(0, 30);
$bokal_cost = 3;
$bokal_total = floor($money / $bokal_cost);
$total_cost = $bokal_total * $bokal_cost;
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .img-container {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        h1, h2 {
            color: green;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="img-container">
    <?php for (; $money >= $bokal_cost; $money -= $bokal_cost) : ?>
        <img src="https://www.stickpng.com/assets/images/580b57fbd9996e24bc43c099.png" width="130px" alt="beer">
    <?php endfor; ?>
</div>
<h1><?php print $total_cost; ?> &euro;</h1>
<h2>(total)</h2>
</body>
</html>