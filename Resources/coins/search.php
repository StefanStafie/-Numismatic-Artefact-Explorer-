<!DOCTYPE HTML>
<html lang='en'>
<?php

?>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/singleCoin.css">
    <link rel="stylesheet" href="../style/SearchStyle.css">
    <script>
        function echoHello() {
            alert("<?PHP hello(); ?>");
        }
    </script>
    <title>Search</title>
</head>

<body>

    <?php include '../navbar.php'; ?>
    <div id="red-canvas-orizontal">
        <section id='search-bar'>
            <p>You can search for coins here</p>
            <form action="search.php" method="post">
                <label for="filter">Filter:</label>
                <input type="text" name="name" placeholder="By name" maxlength="50">
                <input type="text" name="Mint" placeholder="By Mint" maxlength="50">
                <input type="number" name="number" value="10" maxlength="50">
                <input type="submit" value="Search" />
            </form>
        </section>
        <br><br>
        <?php
        require_once 'CoinFunctions.php';
        if (isset($_POST['number'])) {
            for ($i = 0; $i < $_POST['number']; $i++) {
                printCoin("Example Name", "Example Description", 'https://img-9gag-fun.9cache.com/photo/aYyjKWq_700bwp.webp', 'Example Value', 'Example Mint', 'Example Source');
            }
        } else {
            echo "no results";
        }

        ?>
    </div>
</body>

</html>