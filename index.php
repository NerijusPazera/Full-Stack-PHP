<?php
$title = 'Coin- Flip';
$x = rand(1, 2);
$class = 0;
$span = 0;

if ($x == 1) {
    $class = 'heads';
} else {
    $class = 'tails';
}
$span = $class;
?>





<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php print $title ?></title>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            span {
                text-transform: capitalize;
                font-size: 50px;
                font-weight: bold;
            }
            div {
                height: 500px;
                width: 500px;
                background-size: cover;
            }
            .heads {
                background-image: url("https://images-na.ssl-images-amazon.com/images/I/61hsuS11FPL._SY355_.jpg");
            }
            .tails {
                background-image: url("https://image.dhgate.com/0x0p/f2/albu/g6/M00/93/6F/rBVaR1tYhY-ATc8QAAJM0w8EFu8639.jpg");
            }
        </style>
    </head>
    <body>
        <div class="<?php print $class ?>"></div>
        <span><?php print $span ?></span>
    </body>
</html>
