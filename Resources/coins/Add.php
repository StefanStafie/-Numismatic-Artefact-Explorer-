<!DOCTYPE HTML>
<html lang='en'>
<?php

?>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/singleCoin.css">
    <link rel="stylesheet" href="../style/AddStyle.css">
    <link rel="stylesheet" href="../style/SearchStyle.css">

    <title>Search</title>
</head>

<body>

    <?php include '../navbar.php'; ?>
    <div id="red-canvas-orizontal">
        <section id='search-bar'>
            <p>Add a coint to the database</p>
            <form action="add.php" method="get">
                <table>
                    <tr>
                        <td><label>Weight:</label></td>
                        <td><input type="text" name="weight" placeholder="weight" maxlength="20"></td>
                        <td><label>Diameter:</label></td>
                        <td><input type="text" name="diameter" placeholder="diameter" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td><label>Collection link:</label></td>
                        <td><input type="text" name="collUrl" placeholder="collection url" maxlength="50"></td>
                        <td><label>Collection:</label></td>
                        <td><input type="text" name="collection" placeholder="collection" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td><label>Axis:</label></td>
                        <td><input type="text" name="axis" placeholder="axis" maxlength="20"></td>
                        <td><label>More details link:</label></td>
                        <td><input type="text" name="coinUrl" placeholder="coin url" maxlength="50"></td>

                    </tr>
                    <tr>
                        <td><label>Obverse image:</label></td>
                        <td><input type="file" name="obv" accept="image/jpg, image/jpeg"></td>
                        <td><label>Reverse image:</label></td>
                        <td><input type="file" name="rev" accept="image/jpg, image/jpeg"></td>
                    </tr>

                </table>
                <br><br>
                <input type="submit" value="Add coin" />
            </form>
        </section>
        <br><br>

        <?php
        require_once 'CoinFunctions.php';
        require_once '../db/db_connection.php';


        ?>

    </div>
</body>

</html>