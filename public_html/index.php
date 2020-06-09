<?php

require '../bootloader.php';
require ROOT . '/app/templates/homepage_form.tpl.php';

function form_success($form, $safe_input)
{
  $pixel = new \App\Pixel\Pixel($safe_input + ['email' => $_SESSION['user_email']]);

  App\App::$db->insertRow('pixels', $pixel->_getData());
  header("Location: /index.php");
}

$title = 'Home page';
$user = \App\App::$session->getUser();
$database = \App\App::$db->getData();

if ($user) {
  $h1 = 'Sveikas ' . $user->getUsername() . '!';
  unset($nav['buttons']['login'], $nav['buttons']['register']);
} else {
  $h1 = 'Esate neprisijungęs !';
  unset($nav['buttons']['logout']);
  unset($form);
}

$view_nav = new \Core\View($nav);

if ($_POST) {
  $safe_input = (get_filtered_inputs($form));
  validate_form($form, $safe_input);
}

$view_form = new \Core\View($form ?? []);

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
  <h1><?php print $h1; ?></h1>
  <?php print $view_form->render(ROOT . '/core/templates/form.tpl.php'); ?>
  <div class="pixels-container">
    <?php foreach ($database['pixels'] as $pixel) : ?>
      <span class="pixel" style="background-color: <?php print $pixel['color']; ?>;
              top: <?php print $pixel['y']; ?>px; left: <?php print $pixel['x']; ?>px;"></span>
    <?php endforeach; ?>
  </div>
</main>
</html>
