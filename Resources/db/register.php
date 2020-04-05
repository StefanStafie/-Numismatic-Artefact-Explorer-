<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>PHP1</title>
</head>
<body>
    <div id = "math">Register please</div>
    <br><br>
    <form action="register.php" method="get">
        <label>username:</label><br>
        <input type="text" name="username"/><br>
        <label>password:</label><br>
        <input type="text" name="password"/><br>
        <label>email:</label><br>
        <input type="text" name="email"/><br>
        <input type="submit" value="register"/>
    </form>
</body>

<?php
include 'db_connection.php';
function register(){
    if(isset($_GET) && count($_GET) >= 3){
        if(registerUser((string) $_GET['username'], (string) $_GET['password'], (string) $_GET['email']))
            header("Location: " . URL . "index.php");
        }else{
        echo "please input username and password";
    }
}
register();
?>