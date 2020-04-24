<?php include '../navbar.php'; ?>

<!DOCTYPE HTML>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>Profile->Change Email</title>
</head>

<body>
    <div id="red-canvas">
        <div>
            <h1>Change email</h1>
            <br><br>
            <form action="changeEmail.php" method="get">
                <input type="text" name="email" placeholder="New email" maxlength="50">
                <br>
                <input type="password" name="password" placeholder="password" maxlength="50">
                <br>
                <input type="submit" value="Submit" />
            </form>
            <?php
            require_once 'db_connection.php';
            function chEmail()
            {
                if (isset($_GET) && count($_GET) >= 2) {
                    if (changeEmail((string) $_GET['email'], (string) $_GET['password'])) {
                        header("Location: " . URL . "/Resources/profile/profile.php");
                    } else {
                        echo "bad password";
                    }
                } else {
                    echo "please input new email and password";
                }
            }
            chEmail();

            ?>
        </div>
    </div>
</body>