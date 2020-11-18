<?php

$json = file_get_contents("cards.json");
$expansions = json_decode($json, true);


$activeExpansions = [];
array_push($activeExpansions, $expansions["Tanto Cuore"]);
$activeDeck = [];
$game = [];

$defaultCard = array(
    "name" => undefined,
    "type" => "Servante",
    "draw" => 0,
    "service" => 0,
    "love" => 0,
    "buy" => 0,
    "vp" => 0,
    "cost" => 0,
    "groups" => []
);

function addExpansions ($activeExpansions) {
    $deck = [];
    foreach ($activeExpansions as $active) {
        foreach ($active as $card) {
            array_push($deck, $card);
        }
    }
    return $deck;
}

function addDefault($cards, $defaultCard) {
    $deck = [];
    foreach ($cards as $card) {
        $card = array_merge ($defaultCard, $card);
        $card["draw"] > 1 ? array_push($card["groups"], "drawer") : false;
        $card["service"] > 1 ? array_push($card["groups"], "+2 services") : false;
        $card["buy"] > 0 ? array_push($card["groups"], "buy") : false;
        ($card["service"] === 1) && ($card["draw"] === 1) ? array_push($card["groups"], "cantrip") : false;
        array_push($deck, $card);
    }
        return $deck;
}

function removeBanned($cards, $condition) {
    $deck = [];
    foreach ($cards as $card) {
        in_array($condition, $card["groups"]) ? false :  array_push($bannedCards, $card);
    }
}

function addRequired($cards, $condition) {
    $requiredCards = [];
    foreach ($cards as $card) {
        in_array($condition, $card["groups"]) ? array_push($requiredCards, $card) : false;
    }
}




$bannedGroups = array_filter($_POST, function($key) {return strpos($key, "ban") !== false;}, ARRAY_FILTER_USE_KEY);
$requiredGroups = array_filter($_POST, function($key) {return strpos($key, "require") !== false;}, ARRAY_FILTER_USE_KEY);


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
        print_r($bannedGroups);
        print_r($requiredGroups);
        $activeDeck = addExpansions($activeExpansions, $activeDeck);
        $activeDeck = addDefault($activeDeck, $defaultCard);
        print_r($activeDeck);
    ?>
</body>
</html>