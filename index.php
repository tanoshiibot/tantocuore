<?php

$json = file_get_contents("cards.json");
$games = json_decode($json, true);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanto Cuore Randomizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body>

    <form action="results.php" method="post" class="d-flex flex-column justify-content-center container-xl">
        <div class="d-flex justify-content-between col-2 offset-10">
            <label for="actions"> Require +2 Actions</label>
            <input type="checkbox" id="actions" name="requireAction">
        </div>
        <div class="d-flex justify-content-between col-2 offset-10">
            <label for="drawer"> Require Drawer</label>
            <input type="checkbox" id="drawer" name="requireDrawer">
        </div>
        <div class="d-flex justify-content-between col-2 offset-10">
            <label for="buy"> Require Buy</label>
            <input type="checkbox" id="buy" name="requireBuy">
        </div>
        <div class="d-flex justify-content-between col-2 offset-10">
            <label for="allowAttacks"> Allow Attacks</label>
            <input type="checkbox" id="allowAttacks" name="allowAttacks">
        </div>
        <div id="attackRequire">
            <label for="requireAttack"> Require Attack</label>
            <input type="checkbox" id="requireAttack" name="requireAttack">
        </div>

        <input type="submit" value="submit" class="col-2 offset-10">
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
    <script src="./assets/js/script.js"></script>
</body>
</html>