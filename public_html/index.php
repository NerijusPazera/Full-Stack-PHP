<?php


require '../bootloader.php';

$title = 'Home page';

$users = file_to_array(USERS);

if (isset($_SESSION['user_email'])) {
    foreach ($users as $user) {
        if ($_SESSION['user_email'] == $user['email']) {
            $name = $user['username'];
            $h1 = "Sveiki, sugrįžę $name !";
        }
    }
} else {
    $h1 = 'Jūs neprisijungęs.';
}

$array = [
        'oop' => '!poo'
];


$db = new FileDB(ROOT . '/app/data/db.json');



?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include '../core/templates/nav.php'; ?>
<main>
    <h1><?php print $h1; ?></h1>
</main>
</html>