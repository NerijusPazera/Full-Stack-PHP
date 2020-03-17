<?php

$title = 'Funkcijos';

$x = rand(2, 10);

function pirminis($x) {
    for ($y = 2; $y <= $x / 2; $y++) {
        if($x % $y == 0) {
            return false;
        }
    }
    return true;
}

if(pirminis($x)) {
    $h1 = "Skaicius $x yra pirminis";
}
else {
    $h1 = "Skaicius $x yra nepirminis";
}

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