<?php

$my_solders = 10;
$enemy_solders = rand(5, 15);
$win_percentage = round(($my_solders / ($my_solders + $enemy_solders)) * 100, 0);

$fights = [];

for ($x= 0; $x < $my_solders && $enemy_solders > 0; $x++) {
    $fight['enemies_down'] = 0;
    for ($y = 0; $y < $enemy_solders; $y++){
        $win_chance = rand(0, 100);
        if ($win_percentage > $win_chance) {
            $fight['enemies_down'] += 1;
            $enemy_solders--;
        }
        else {
            break;
        }
    }
}

var_dump($fights);

?>


<!--<html lang="en" dir="ltr">-->
<!--  <head>-->
<!--    <meta charset="utf-8">-->
<!--    <link rel="stylesheet" href="/assets/css/style.css">-->
<!--    <title></title>-->
<!--  </head>-->
<!--  <body>-->
<!--      <main>-->
<!--          <div class="fights-container">-->
<!--              --><?php //foreach ($fights as $fight): ?>
<!--                  <div class="fight">-->
<!--                      <div class="my-soldier">M</div>-->
<!--                      <div class="hedge">-</div>-->
<!--                      --><?php //for ($i = 0; $i < $fight['enemies_down']; $i++): ?>
<!--                          <div class="enemy-soldier">E</div>-->
<!--                      --><?php //endfor; ?>
<!--                  </div>-->
<!--              --><?php //endforeach; ?>
<!--          </div>-->
<!--      </main>-->
<!--  </body>-->
<!--</html>-->
