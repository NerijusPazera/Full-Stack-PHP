<?php

/**
 * F-ija kelianti skaiciu kvadratu
 * @param array $x
 * @return float
 */
function square(float $x): float
{
    return $x ** 2;
}

$span = 'Neivedete jokio skaiciaus !';

if (isset($_POST['number']) && $_POST['number'] != '') {
    $span = 'Ivestas skaicius pakleltas kvadratu: ' . square($_POST['number']);
}


$title = 'Formos';

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
</head>
<body>
<form method="post">
    <label>Iveskite skaiciu:
        <input type="text" name="number">
    </label>
    <input type="submit" value="siusti">
</form>
<span><?php print $span; ?></span>
</body>
</html>
