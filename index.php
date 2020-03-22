<?php

function car($name, $year_made, $fuel_type, $price) {
    return [
        'name' => $name,
        'fuel_type' => $fuel_type,
        'year_made' => $year_made,
        'price' => $price
    ];
}

function price_range($min, $max, $cars) {

    $results = [];
    foreach ($cars as $car) {
        if ($car['price'] > $min && $car['price'] < $max) {
            $results[] = $car;
        }
    }
    return $results;
}

$cars = [
        car('BMW E60', 2005, 'Diesel', 6000),
        car('BMW F30', 2011, 'Petrol', 15000),
        car('BMW F10', 2014, 'Petrol', 18000),
        car('BMW G15', 2018, 'Petrol', 100000),

];

var_dump(price_range(1000, 20000, $cars));

?>


<!--<html>-->
<!--<head>-->
<!--    <title></title>-->
<!--</head>-->
<!--<body>-->
<!--</body>-->
<!--</html>-->