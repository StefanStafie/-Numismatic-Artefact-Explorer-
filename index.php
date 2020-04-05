
<?php
session_start();
echo $_SESSION['user_id'];
if(isset($_SESSION['user_id'])){
    echo "you are in";
    echo "<a href = \"Resources/db/signout.php\">sign out</a>"; 
} else{
    echo "<a href = \"Resources/db/register.php\">Register</a> or <a href = \"Resources/db/login.php\">Login</a>";
}
?>