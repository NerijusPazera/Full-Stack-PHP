<?php
    $title = 'Lenta | PHP Fight Club';
    $p = date('Y-m-d H:i:s') . ' Nerijus grįžo į PHPFIGHTCLUB`ą !';
    $p_2 = date('F', strtotime('-1 month')) . ' Nerijus priėmė teisingą sprendimą.';
?>





<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php print $title ?></title>
    </head>
    <body>
        <p><?php print $p?></p>
        <p><?php print $p_2 ?></p>
    </body>
</html>
