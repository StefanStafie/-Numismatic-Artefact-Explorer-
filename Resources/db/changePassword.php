<?php include '../navbar.php'; ?>

<!DOCTYPE HTML>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>Profile->Change Password</title>
</head>

<body>
    <div id="red-canvas">
        <div>
            <h1>Change Password</h1>
            
            <form action="changePassword.php" method="get">
                <br>
                <input type="text" name="oldpassword" placeholder="Old password" maxlength="50">
                <br>
                <input type="password" name="password" placeholder="New password" maxlength="50">
                <br>
                <input type="password" name="password2" placeholder="Repeat new password" maxlength="50">
                <br>
                <input type="submit" value="Submit">
            </form>
            <?php
            require_once 'db_connection.php';
            function chEmail()
            {
                if (isset($_GET) && count($_GET) >= 3) {
                    if ((string) $_GET['password'] == (string) $_GET['password2']) {
                        if (changePassword((string) $_GET['oldpassword'], (string) $_GET['password'])) {
                            header("Location: " . URL . "/Resources/profile/profile.php");
                        } else {
                            echo "bad old password";
                        }
                    } else {
                        echo "passwords don't match";
                    }
                } else {
                    echo "please input passwords";
                }
            }
            chEmail();

            ?>
        </div>
    </div>
</body>