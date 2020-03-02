<?php

$police_fuel = rand(1, 60);
$police_cons = 7.5;
$my_fuel = rand(1, 60);
$my_cons = 11.5;

$p_distance = round(($police_fuel / $police_cons) * 100, 1);
$m_distance = round(($my_fuel / $my_cons) * 100, 1);
$distance_between = $m_distance - $p_distance;

$title = 'Pabėgimo skaičiuoklė';
$h1 = 'Pabėgimo skaičiuoklė';
$li_1 = "Farai nuvažiuotų : $p_distance km;";
$li_2 = "Aš nuvažiuočiau : $m_distance km.";

if ($p_distance >= $m_distance) {
    $class = 'nepavyko';
    $isvada = 'Neavyko pabėgti.';
}
else {
    $class = 'pavyko';
    $isvada = 'Pavyko pabėgti.';
}

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <style>
        div {
            text-align: center;
        }
        .img-container {
            width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .img-container-2 {
            display: flex;
        }
        .summary {
            text-align: center;
        }
        .line {
            height: 50px;
            width: 500px;
            background-image: url("https://lh3.googleusercontent.com/proxy/o4nxzdpY8ivoPJhSEYUq_oL3ROHuMm9ItLJXrb4SgS_WxdhQ-uBgEFIwfepLqMLhoDfS0FysnIGT8q9uUDyvlP8e");
            background-size: cover;
            background-position: center;
        }
        .fuck {
            transform: translate(40%, -20%) rotate(-50deg);
            position: relative;
        }
        .police {
            background-image: url("https://pngimg.com/uploads/police_car/police_car_PNG22.png");
            height: 110px;
            width: 270px;
            background-size: cover;
        }
        .me {
            background-image: url("https://www.citybee.lt/storage/app/media/cars%20png/multipla.png");
            height: 150px;
            width: 250px;
            background-size: cover;
        }
        .dick {
            background-image: url("https://lubezilla.b-cdn.net/media/catalog/product/cache/1/image/1200x/9df78eab33525d08d6e5fb8d27136e95/1/0/1015_36_bu_1_3.png");
            height: 50px;
            width: 40px;
            background-size: cover;
            position: absolute;
            top: 70%;
            transform: translate(70px) rotate(120deg);
        }
    </style>
</head>
    <body>
        <h1><?php print $h1; ?></h1>
        <ul>
            <li><?php print $li_1; ?></li>
            <li><?php print $li_2; ?></li>
        </ul>
        <?php if($class == 'pavyko') : ?>
        <div class="img-container">
            <div class="police"></div>
            <div class="summary">
                <p><?php print $distance_between; ?>km</p>
                <div class="line"></div>
                <p><?php print $isvada; ?></p>
            </div>
            <div class="me"></div>
        </div>
        <?php else : ?>
            <div>
                <div class="img-container-2">
                    <div class="police fuck"><div class="dick"></div></div>
                    <div class="me"></div>
                </div>
                <p><?php print $isvada; ?></p>
            </div>
        <?php endif; ?>
    </body>
</html>