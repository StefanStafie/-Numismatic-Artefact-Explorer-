<?php require_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel="stylesheet" href="../Style/style3.css">
    <link rel="stylesheet" href="../Style/LoginRegister.css">
    <title>Profile->Stats</title>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <section id="red-canvas">
        <div class="left">
            <h1>Select your statistics?</h1>
            <form action="statsPage.php" method="get">
                <label>Format: </label>
                <select id="do" name="do">
                    <option value="csv">CSV</option>
                    <option value="pdf">PDF</option>
                </select><br>
                <label>What kind of statistics?</label>
                <select id="do" name="do">
                    <option value="sada">stat1</option>
                    <option value="asd">stat2</option>
                </select><br>
                <input type="submit" value="Get stats" />
            </form>
        </div>
    </section>
</body>

</html>