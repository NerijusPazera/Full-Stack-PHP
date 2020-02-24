<?php
$title = 'Sriuba';
$soup_ml = rand(400, 700);
$soup_temp = rand(15, 40);
$piss_ml = rand(100, 350);
$piss_temp = 36.4;
$soup_piss_temp = round((($soup_ml * $soup_temp) + ($piss_ml * $piss_temp)) / ($soup_ml + $piss_ml),1);
$h1 = 'Sriubos prognozė';
$p_1 = "Pradžioje puode buvo $soup_ml ml. $soup_temp C. sriubos.";
$p_2 = "Į puodą primyžus $piss_ml ml., sriubos temperatūra patapo $soup_piss_temp C.";


?>





<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php print $title ?></title>
    </head>
    <body>
        <h1><?php print $h1 ?></h1>
        <p><?php print $p_1 ?></p>
        <p><?php print $p_2 ?></p>
    </body>
</html>
