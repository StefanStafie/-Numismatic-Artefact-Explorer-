<?php include '../navbar.php'; ?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>Profile->Register</title>
</head>

<body>
    <section id="red-canvas">
        <div class="left">
            <h1>Register</h1>
            <form action="register.php" method="get">
                <input type="text" name="username" placeholder="Username" maxlength="50">
                <br>
                <input type="text" name="firstName" placeholder="First Name" maxlength="50">
                <br>
                <input type="text" name="lastName" placeholder="Last Name" maxlength="50">
                <br>
                <input type="password" name="password" placeholder="Password" maxlength="50">
                <br>
                <input type="password" name="password2" placeholder="Repeat Password" maxlength="50">
                <br>
                <input type="text" name="email" placeholder="Email" maxlength="50">
                <br><br>
                <input type="submit" value="register" />
            </form>
            <?php
            include 'db_connection.php';
            function register()
            {
                if (isset($_GET)) {
                    if (count($_GET) >= 6) {
                        if ($_GET['password'] == $_GET['password2']) {
                            if (strlen($_GET['password']) >= 8) {
                                if (strlen($_GET['lastName']) < 50 && strlen($_GET['firstName']) < 50) {
                                    if (registerUser((string) $_GET['firstName'], (string) $_GET['lastName'], (string) $_GET['username'], (string) $_GET['password'], (string) $_GET['email']))
                                        header("Location: " . URL . "/Resources/profile/profile.php");
                                } else {
                                    echo "First name and last name must be shorter than 50 characters.";
                                }
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
            }
            register();
            ?>
        </div>
        <div class="right">
            <a class="link" href="login.php">Have an account? <br> Sign in now!</a><br><br><br><br>
            <a class="link" href="../profile/profile.php">Forgot Password? <br> sucks mate</a>
        </div>
    </section>
</body>

</html>