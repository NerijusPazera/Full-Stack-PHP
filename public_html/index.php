<?php

require '../bootloader.php';

$title = 'Home page';
$user = current_user();

if($user) {
    $h1 = 'Sveikas ' . $user['username'] . '!';
    unset($nav['buttons']['login'], $nav['buttons']['register']);
} else {
    $h1 = 'Esate neprisijungęs !';
    unset($nav['buttons']['logout']);
}

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include '../core/templates/nav.tpl.php'; ?>
<main>
    <h1><?php print $h1; ?></h1>
</main>
</html>
