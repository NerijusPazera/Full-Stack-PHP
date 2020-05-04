<?php

require '../bootloader.php';
require ROOT . '/app/templates/register_form.tpl.php';

function form_success($form, $safe_input)
{
    $user = new App\Users\User($safe_input);

    App\App::$db->insertRow('users', $user->_getData());
    header("Location: /login.php");
}

$title = 'Register';
$user = \App\App::$session->getUser();

if ($user) {
    unset($nav['buttons']['login'], $nav['buttons']['register']);
} else {
    unset($nav['buttons']['logout']);
}

$view_nav = new \Core\View($nav);

if ($_POST) {
    $safe_input = (get_filtered_inputs($form));
    validate_form($form, $safe_input);
}

$view_form = new \Core\View($form);

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php print $view_nav->render(ROOT . '/core/templates/nav.tpl.php'); ?>
<main>
    <?php print $view_form->render(ROOT . '/core/templates/form.tpl.php'); ?>
</main>
</html>
