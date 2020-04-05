<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="../style/style3.css">
    <title>PHP1</title>
</head>
<body>
    <div id = "math">Login please</div>
    <br><br>
    <form action="login.php" method="get">
        <label>username:</label><br>
        <input type="text" name="username"/><br>
        <label>password:</label><br>
        <input type="text" name="password"/><br>
        <input type="submit" value="login"/>
    </form>
</body>

<?php
include 'db_connection.php';
function login(){
    if(isset($_GET) && count($_GET) >= 2){
        if(loginUser((string) $_GET['username'], (string) $_GET['password'])){  
            header("Location: " . URL . "index.php");
        }
    }else{
        echo "please input username and password";
    }
}
login();

?>