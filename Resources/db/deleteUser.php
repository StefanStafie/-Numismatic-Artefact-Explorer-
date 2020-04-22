<?php
require_once 'db_connection.php';
function delete()
{
    if (isset($_SESSION['user_id'])) {//daca e logat, nu mai intra pe formular 
        if (deleteUser($_SESSION['user_id'])) {
            header("Location: " . URL . "/Resources/db/signout.php");
        }
    } else {
        echo 'Unknown error on delete. deleteUser returned false;';
    }
}
delete();
?>