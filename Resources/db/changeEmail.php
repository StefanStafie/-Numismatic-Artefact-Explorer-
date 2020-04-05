<?php include '../navbar.php'; ?>

<!DOCTYPE HTML>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>Profile->Login</title>
</head>

<body>
    <div class="white">
        <h1>Change email</h1>
        <br><br>
        <form action="changeEmail.php" method="get">
            <label>New email:</label><br>
            <input type="text" name="email" /><br>
            <label>Confirm password:</label><br>
            <input type="password" name="password" /><br>
            <input type="submit" value="login" />
        </form>
        <?php
        require_once 'db_connection.php';
        function chEmail()
        {
            if (isset($_GET) && count($_GET) >= 2) {
                if (changeEmail((string) $_GET['email'], (string) $_GET['password'])) {
                    header("Location: " . URL . "/Resources/profile/profile.php");
                } else{
                    echo "bad password";
                }
            } else {
                echo "please input new email and password";
            }
        }
        chEmail();

        ?>
    </div>
</body>