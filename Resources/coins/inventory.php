<!DOCTYPE HTML>
<html lang='en'>
<?php

?>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/singleCoin.css">
    <link rel="stylesheet" href="../style/SearchStyle.css">
    <title>Search</title>
</head>

<body>

    <?php include '../navbar.php'; ?>
    <div id="red-canvas-orizontal">
        <section id='search-bar'>
            <p>These are your coins</p>
            <form action="inventory.php" method="get">
                <label for="filter">Filter:</label>
                <input type="text" name="Identifier" placeholder="by identifier" maxlength="50">
                <input type="number" name="Diameter" placeholder="by diameter" min="0" max="8000">
                <input type="number" name="Weight" placeholder="by weight" min="0" max="1012">
                <input type="number" name="Axis" placeholder="by axis" min="0" max="360">
                <input type="file" name="image" id="by image" accept="image/jpg, image/jpeg">
                <br>

                <input type="number" name="number" placeholder="no of results" min="0" max="200">
                <input type="submit" value="Search" />
            </form>
        </section>
        <br><br>
        
        <?php
        require_once 'CoinFunctions.php';
        require_once '../db/db_connection.php';
        if (isset($_GET['number'])) {
            $coins = getMyCoins($_GET['number']);
            if (!$coins) {
                echo "0 results";
            } else {
                for ($i = 0; $i < $_GET['number']; $i++) {
                    printCoin($coins[$i][4], $coins[$i][2], $coins[$i][1], $coins[$i][3], $coins[$i][6], $coins[$i][0], $coins[$i][5], $coins[$i][11], $coins[$i][14]);
                }
            }
        } else {
            echo "0 results";
        }

        ?>
        
    </div>
</body>

</html>