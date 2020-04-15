<?php

header("Location: create.php");

require 'bootloader.php';

$title = 'Apklausa';


if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

$user_id = $_COOKIE['user_id'] ?? rand(1, 100);
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', $user_id, strtotime('+1 year'));
setcookie('visits', $visits, strtotime('+1 year'));

$h1 = "User ID: $user_id";
$h2 = "Visits: $visits";

$data = file_to_array(DB_FILE);

if (isset($_COOKIE['form_done'])) {
    header("Location: http://phpsualum.lt/users.php");
}

if (isset($_COOKIE['form_inputs'])) {
    $data = json_decode($_COOKIE['form_inputs'], true);

    fill_form($form, $data);

    unset($field);
}


?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="app/assets/css/style.css">
</head>
<style>
</style>
<body>
<main>
    <?php include 'core/templates/form.tpl.php'; ?>
    <h1><?php print $h1; ?></h1>
    <h2><?php print $h2; ?></h2>
</main>
</html>