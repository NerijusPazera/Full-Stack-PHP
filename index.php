<?php

$police_fuel = rand(1, 60);
$police_cons = 7.5;
$my_fuel = rand(1, 60);
$my_cons = 11.5;

$p_distance = round(($police_fuel / $police_cons) * 10, 1);
$m_distance = round(($my_fuel / $my_cons) * 10, 1);

$title = 'Pabėgimo skaičiuoklė';
$h1 = 'Pabėgimo skaičiuoklė';
$li_1 = "Farai nuvažiuotų : $p_distance km;";
$li_2 = "Aš nuvažiuočiau : $m_distance km.";

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
</head>
    <body>
        <?php print $h1; ?>
        <ul>
            <li><?php print $li_1; ?></li>
            <li><?php print $li_2; ?></li>
        </ul>
    </body>
</html>