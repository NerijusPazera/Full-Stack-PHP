<?php

$size = 50;

if (isset($_POST['size']) && is_numeric($_POST['size'])) {
    $size = $_POST['size'];
}

$title = 'Formos';

var_dump($_POST);
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
</head>
<body>
<form method="post">
    <label>Pasirinkite dydi:
        <input type="range" name="size" value="<?php print $size; ?>" min="1" max="100">
    </label>
    <button name="action">Keisk dydi !</button>
</form>
<div class="img-container" style="height: 600px; width: 900px;">
    <img src="assets/images/boobs.png" alt="boobs" height="<?php print $size ?>%">
</div>
</body>
</html>
