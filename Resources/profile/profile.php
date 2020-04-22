<?php include '../navbar.php'; ?>

<!DOCTYPE HTML>

<head>
    <link rel="stylesheet" href="../style/style3.css">
</head>

<body>
    <div class="white">
        <?php
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo "<h1> You are currently just a GUEST here.</h1>
            <h1> Would you like to <a href = \"../db/login.php\">log in</a> or <a href = \"../db/register.php\">register</a>?</h1>";
        } else {
            echo "<h1>Hello " . $_SESSION['name'] . "</h1> 
                <h3> Your email: " . $_SESSION['email'] . "</h3>
                <h3>Not much to do here</h3><br>
                <p><a href = \"../db/changeEmail.php\">Change email</a></p>
                <p><a href = \"../db/changePassword.php\">Change password</a></p>
                <p><a href = \"../db/signout.php\">Sign Out</a></p>
                <p><a href = \"../db/verify.php\">Verify</a></p>";

            if ($_SESSION['verified'] == '0') {
                echo "You still haven't verified your email. Please DO.";
            }
        }
        ?>
    </div>
</body>