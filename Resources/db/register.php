<?php include '../navbar.php'; ?>

<!DOCTYPE HTML>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>Profile->Register</title>
</head>

<body>
    <div class="white">
        <h1>Register please</h1>
        <br><br>
        <form action="register.php" method="get">
            <label>username:</label><br>
            <input type="text" name="username" /><br>
            <label>password:</label><br>
            <input type="password" name="password" /><br>
            <label>confirm password:</label><br>
            <input type="password" name="password2" /><br>
            <label>email:</label><br>
            <input type="text" name="email" /><br>
            <input type="submit" value="register" />
        </form>


    <?php
    include 'db_connection.php';
    function register()
    {
        if (isset($_GET) && count($_GET) >= 4) {
            if ($_GET['password'] == $_GET['password2']) {
                if (strlen($_GET['password']) >= 8) {
                    if (registerUser((string) $_GET['username'], (string) $_GET['password'], (string) $_GET['email']))
                        header("Location: " . URL . "/Resources/profile/profile.php");
                } else {
                    echo "password must be at least <br>8 characters long";
                }
            } else {
                echo "passwords don't match";
            }
        } else {
            echo "please complete all fields";
        }
    }
    register();
    ?>
    <br><br>
    <p>Would you like to <a href="login.php">login</a> instead?</p>

    </div>
</body>