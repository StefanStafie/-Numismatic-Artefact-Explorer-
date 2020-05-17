<?php require_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel="stylesheet" href="../Style/style3.css">
    <link rel="stylesheet" href="../Style/LoginRegister.css">
    <title>Profile->Login</title>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <section id="red-canvas">
        <div class="left">
            <h1>Sign in</h1>
            <form action="login.php" method="get">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br><br>
                <input type="submit" value="login" />
            </form>
            <br>
            <?php
            function login()
            {
                if (isset($_GET)) {
                    if (count($_GET) >= 2) {
                        if (loginUser((string) $_GET['username'], (string) $_GET['password'])) {
                            header("Location: " . URL . "/Resources/profile/profile.php");
                        }
                    } else {
                        echo "please input username and password";
                    }
                }
            }
            login();
            ?>
        </div>
        <div class="right">
            <a class="link" href="register.php">Not registered? <br>Make an account now!</a>
            <br><br><br><br>
            <a class="link" href="../profile/profile.php">Forgot Password? <br>sucks mate</a>
        </div>
    </section>



</body>

</html>