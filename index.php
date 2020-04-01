<?php

require 'bootloader.php';

$title = 'Formos';


if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

//var_dump($safe_input ?? []);
//var_dump($form['fields']);
var_dump(file_to_array(DB_FILE));

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
</main>
</html>