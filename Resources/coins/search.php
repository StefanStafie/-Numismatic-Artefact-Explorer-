<?php
require_once '../db/db_connection.php';
?>

<!DOCTYPE HTML>
<html lang='en'>


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
            <p>You can search for coins here</p>
            <form action="search.php" method="get">
                <label for="filter">Filter:</label>
                <input type="text" name="identifier" placeholder="by identifier" maxlength="50">
                <input type="number" name="diameter" placeholder="by diameter" min="0" max="8000">
                <input type="number" name="weight" placeholder="by weight" min="0" max="1012">
                <input type="number" name="axis" placeholder="by axis" min="0" max="360">
                <!--<input type="file" name="image" id="by image" accept="image/jpg, image/jpeg">-->
                <br>

                <input type="number" name="number" placeholder="no of results" min="0" max="59000" value="20">
                <input type="submit" value="Search" />
            </form>
        </section>
        <a id = "compareLink" href="compare.php">Go to compare</a>

        <br><br>

        <?php
        require_once 'CoinFunctions.php';
        if (isset($_GET['number'])) {
            $filter = "WHERE ";
            if (isset($_GET['identifier']) && $_GET['identifier'] != "")
                $filter .= "identifier like '%" . $_GET['identifier'] . "%'";
            if (isset($_GET['diameter']) && $_GET['diameter'] != "")
                if ($filter != "WHERE ")
                    $filter .= " AND diameter > " . $_GET['diameter'] . " AND diameter < " . ++$_GET['diameter'];
                else
                    $filter .= "diameter > " . $_GET['diameter'] . " AND diameter < " . ++$_GET['diameter'];

            if (isset($_GET['weight']) && $_GET['weight'] != "")
                if ($filter != "WHERE ")
                    $filter .= " AND weight > " . $_GET['weight'] . " AND weight < " . ++$_GET['weight'];
                else
                    $filter .= "weight > " . $_GET['weight'] . " AND weight < " . ++$_GET['weight'];

            if (isset($_GET['axis']) && $_GET['axis'] != "")
                if ($filter != "WHERE ")
                    $filter .= " AND axis > " . $_GET['axis'] . " AND axis < " . ++$_GET['axis'];
                else
                    $filter .= "axis > " . $_GET['axis'] . " AND axis < " . ++$_GET['axis'];


            if ($filter == "WHERE ")
                $filter = "";

            echo $filter . "    ";
            $coins = getFirstCoins($filter, $_GET['number']);
            if (!$coins) {
                echo "0 results";
            } else {
                echo count($coins) . " results";
                for ($i = 0; $i < count($coins); $i++) {
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