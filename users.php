<?php

require 'bootloader.php';

$title = 'Apklausos rezultatai';

$table = [
    'thead' => [
        'Klausimas',
        'Taip (%)',
    ],
    'tbody' => [
    ],
];

$data = file_to_array(DB_FILE);
//var_dump($data);

$positive_answers = [
    'ar_laikai' => 0,
    'ar_pili' => 0,
    'ar_rukai' => 0,
];


$respondentai = 0;

foreach ($data as $personal_answers) {
    $respondentai++;

    foreach ($personal_answers as $question_id => $question_answer) {
        if ($question_answer === 'taip') {
            $positive_answers[$question_id]++;
        }
    }
}

foreach ($positive_answers as $question_id => $positive_answers_qty) {
    $form['fields'][$question_id]['positive_percentage'] = round(($positive_answers_qty / $respondentai) * 100, 2);
}
//var_dump($respondentai);

foreach ($form['fields'] as $field_id => $field) {
    if (in_array($field['type'], ['radio'])) {
        $table['tbody'][] = [
            'klausimas' => $field['headline'],
            'atsakymas' => $field['positive_percentage']
        ] ?: [];
    }
}
//$table['tbody'] = file_to_array(DB_FILE) ?: [];

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/assets/css/style.css">
    <title><?php print $title; ?></title>
</head>
<body>
<?php include 'core/templates/table.tpl.php'; ?>
<h2>Viso respondentų: <?php print $respondentai; ?></h2>
<a href="index.php">Grįžti į apklausą</a>
</body>
</html>