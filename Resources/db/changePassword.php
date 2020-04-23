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
        <form action="changePassword.php" method="get">
            <label>old password:</label><br>
            <input type="text" name="oldpassword" /><br>
            <label>new password:</label><br>
            <input type="password" name="password" /><br>
            <label>confirm new password:</label><br>
            <input type="password" name="password2" /><br>
            <input type="submit" value="login" />
        </form>
        <?php
        require_once 'db_connection.php';
        function chEmail()
        {
            if (isset($_GET) && count($_GET) >= 3) {
                if( (string) $_GET['password'] == (string) $_GET['password2']){
                    if (changePassword((string) $_GET['oldpassword'], (string) $_GET['password'])) {
                        header("Location: " . URL . "/Resources/profile/profile.php");
                    } else{
                        echo "bad password";
                    }
                }else {
                    echo "passwords don't match";
                }
            } else {
                echo "please input passwords";
            }
        }
        chEmail();

        ?>
    </div>
</body>