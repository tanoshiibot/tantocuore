<?php

$json = file_get_contents("cards.json");
$games = json_decode($json, true);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
        print_r($games);
    ?>
    <button id="run">Run</button>
    <section id="card_container">

    </section>
    <form>
        <input type="checkbox" id="actions">
        <label for="actions"> Require +2 Actions</label>
        <input type="checkbox" id="drawer">
        <label for="drawer"> Require Drawer</label>
        <input type="checkbox" id="buy">
        <label for="buy"> Require Buy</label>
        <input type="checkbox" id="attack">
        <label for="attack"> Allow Attacks</label>
        <input type="checkbox" id="attack_r">
        <label for="attack_r"> Require Attack</label>
    </form>

    <table>
        <?php
        echo "<p>Liste des cartes :</p>";
        for ($i = 0; $i < (count($games["Tanto Cuore"]) / 6); $i++)
        {
            echo "<tr>";
            for ($j = 0; $j < 6; $j++)
            {
                echo "<td>{$games["Tanto Cuore"][$i * 6 + $j]["name"]}</td>";
            }
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>