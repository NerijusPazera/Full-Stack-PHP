<?php

/**
 * F-ija generuojanti formos atributus
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string
{
    $atributes = '';

    foreach ($attr as $index => $value) {
        $atributes .= "$index=\"$value\" ";
    }

    return $atributes;
}

$title = 'Formos';

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ]
]

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
</style>
<body>
<?php include 'templates/form.tpl.php'; ?>
</html>
