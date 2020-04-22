   
<?php
require_once 'db_connection.php';
function verifyEmail()
{
    if (isset($_SESSION['name']) && isset($_SESSION['password']) && isset($_SESSION['user_id'])) {//daca e logat, nu mai intra pe formular 
        if (verify($_SESSION['name'], $_SESSION['password'], $_SESSION['user_id'])) {
            header("Location: " . URL . "/Resources/profile/profile.php");
        }
        echo "email has already been verified";
    } else {
        header("Location: " . URL . "/Resources/db/login.php");
    }
}
verifyEmail();
?>