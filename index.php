<?php

$title = 'Funkcijos';

$a = rand(1, 10);
$b = rand(10, 20);

/**
 * @param $x
 * @param $y
 * @return mixed
 */
function suma($x, $y) {
    return $x + $y;
}

$suma = suma($a, $b);

$h1 = "$a ir $b suma: $suma";

?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?php print $title; ?></title>
</head>
<body>
    <h1><?php print $h1; ?></h1>
</body>
</html>