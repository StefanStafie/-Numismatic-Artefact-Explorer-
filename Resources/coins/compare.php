<?php require_once '../db/db_connection.php'; ?>
<!DOCTYPE HTML>
<html lang='en'>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/singleCoin.css">
    <title>Compare</title>
</head>

<body>

    <?php include '../navbar.php'; ?>
    <div id="red-canvas-orizontal">
        <div>
            <form action="compare.php" method="get">
                <input type="text" name="identifier1" placeholder="identifier" maxlength="50">
                <input type="submit" value="Compare" />
                <input type="text" name="identifier2" placeholder="identifier" maxlength="50">
            </form>
        </div>
        <?php
        require_once 'CoinFunctions.php';
        $ok = 0;
        if (isset($_GET)) {
            if (isset($_GET['identifier1']) && $_GET['identifier1'] != "" && isset($_GET['identifier2']) && $_GET['identifier2'] != "") {
                $coin1 = findCoin($_GET['identifier1']);
                $coin2 = findCoin($_GET['identifier2']);
                if ($coin1 != false && $coin2 != false)
                    $ok = 1;
                else {
                    echo "Identifiers are corrupt. Choose others";
                }
            }
        }
        
        if($ok){
        echo '<div class="cico">
                <div class="vertical-coin">
                <p>identifier: ' . $coin1[0][4] . '</p>
                <p>weight: ' . $coin1[0][1] . '</p>
                <p>diameter' . $coin1[0][2] .'</p>
                <p>axis' . $coin1[0][3] . '</p>
                <img src="' . $coin1[0][11] . '" alt="image unavailable" class="coinImage compare">
                <img src="' . $coin1[0][14] . '" alt="image unavailable" class="coinImage compare">
            </div>
            <div style = "height:100px; width:70px"></div>
            <div class="vertical-coin">
                <p>identifier: ' . $coin1[0][4] . '</p>
                <p>weight: ' . $coin1[0][1] . '</p>
                <p>diameter: ' . $coin1[0][2] . '</p>
                <p>axis: ' . $coin1[0][3] . '</p>
                <img src="' . $coin1[0][11] . '" alt="image unavailable" class="coinImage compare">
                <img src="' . $coin1[0][14] . '" alt="image unavailable" class="coinImage compare">
            </div>
        </div>';

        }
        ?>
    </div>
</body>

</html>