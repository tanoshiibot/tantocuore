<?php

$json = file_get_contents("cards.json");
$expansions = json_decode($json, true);


$activeExpansions = [];
array_push($activeExpansions, "Tanto Cuore");
$activeDeck = [];

$bannedGroups = array_filter($_POST, function($key) {return strpos($key, "ban") !== false;}, ARRAY_FILTER_USE_KEY);
$requiredGroups = array_filter($_POST, function($key) {return strpos($key, "require") !== false;}, ARRAY_FILTER_USE_KEY);

$game = [];

//deck to shuffle

$defaultCard = array(
    "name" => "noname",
    "type" => "Servante",
    "draw" => 0,
    "service" => 0,
    "love" => 0,
    "buy" => 0,
    "vp" => 0,
    "cost" => 0,
    "groups" => []
);

function addExpansions ($expansions, $activeExpansions) {
    $deck = [];
    foreach (array_keys($expansions) as $expansion) {
        if (in_array($expansion, $activeExpansions)) {
            foreach ($expansions[$expansion] as $card) {
            array_push($deck, $card);
            }
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

function lookType($card) {
    return $card["type"] == "Servante";
}

function takeWaitress($deck) {
    return array_filter($deck, "lookType");
}

function removeBanned($conditions, $cards) {
    $deck = [];
    foreach ($cards as $card) {
        foreach ($conditions as $condition) {
            !in_array($condition, $card["groups"]) ? array_push($deck, $card) : false ;
        }
    }
    return $deck;
}

//deck shuffled



function addRequired($conditions, $cards, $deck) {
    $requiredCards = [];
    foreach ($cards as $card) {
        foreach ($conditions as $condition) {
            if (in_array($condition, $card["groups"])) {
                array_push($requiredCards, $card);
            }
        }
    }
    foreach ($conditions as $condition) {
        $alreadyThere = false;
        foreach($deck as $card) {
            in_array($condition, $card["groups"]) ? $alreadyThere = true : false;
        }
        if (!$alreadyThere) {
            $randCard = $requiredCards[rand(0, count($requiredCards) - 1)];
            array_push($deck, $randCard);
            array_splice($cards, array_search($randCard, $cards), 1);
        }
    }

    return [$cards, $deck];
}

function addRandomCards($cards, $deck) {
    $alreadyThere = count($deck);
    for ($i = 0; $i < (10 - $alreadyThere); $i++){
        $randCard = $cards[rand(0, count($cards) - 1)];
        array_push($deck, $randCard);
        array_splice($cards, array_search($randCard, $cards), 1);
    }
    return $deck;
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tanto Cuore Randomizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <p>Not finished :(</p>
    <?php
        print_r($bannedGroups);
        print_r($requiredGroups);
        $activeDeck = addExpansions($expansions, $activeExpansions);
        $activeDeck = addDefault($activeDeck, $defaultCard);
        $activeDeck = takeWaitress($activeDeck);
        $bannedGroups ? $activeDeck = removeBanned($bannedGroups, $activeDeck) : false;
        if ($requiredGroups) {
            $a = addRequired($requiredGroups, $activeDeck, $game);
            $activeDeck = $a[0];
            $game = $a[1];
        }
        $game = addRandomCards($activeDeck, $game);
        echo "<pre>";
        print_r($game);
        echo "</pre>";

    ?>
</body>
</html>