<?php

function requireGroup($group) {
    if (isset($_POST[$group])) {
        echo $group;
    }
}

$json = file_get_contents("cards.json");
$games = json_decode($json, true);
$expansion0 = $games["Tanto Cuore"];

$allowedGroups = array_filter($_POST, function($key) {return strpos($key, "allow") !== false;}, ARRAY_FILTER_USE_KEY);
$requiredGroups = array_filter($_POST, function($key) {return strpos($key, "require") !== false;}, ARRAY_FILTER_USE_KEY);




$deck = [];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tanto Cuore Randomizer</title>
</head>
<body>
    <p>Not finished :(</p>
    <?php
        print_r($_POST);
        print_r($allowedGroups);
        print_r($requiredGroups);
    ?>
</body>
</html>