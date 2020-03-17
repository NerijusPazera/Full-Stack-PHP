<?php

$title = 'Palicijos išrašas';
$h1 = $title;

$police_report = [
    [
        'subject' => 'Domantas',
        'reason' => 'Public Urination',
        'amount' => 50
    ],
    [
        'subject' => 'Migle',
        'reason' => 'Drunk in public',
        'amount' => 0
    ],
    [
        'subject' => 'Nerijus',
        'reason' => 'Speeding',
        'amount' => 100
    ]
];

foreach ($police_report as $report_id => $report) {
    if (!$report['amount']) {
        $police_report[$report_id]['warning'] = true;
    }
    else {
        $police_report[$report_id]['warning'] = false;
    }

    $police_report[$report_id]['text'] = $report['subject'] . ' ' . '(' . $report['reason'] . ') ';
}

foreach ($police_report as $report_id => $report) {
    if ($report['warning']) {
        $police_report[$report_id]['text'] .= 'Įspėjimas';
    }
    else {
        $police_report[$report_id]['text'] .= $report['amount'] . ' Eurų bauda';
    }
}

//var_dump($police_report);
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?php print $title; ?></title>
</head>
<body>
<h1><?php print $h1; ?></h1>
<ul>
    <?php foreach ($police_report as $report) : ?>
        <li><?php print $report['text']; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
