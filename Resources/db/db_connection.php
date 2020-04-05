<?php
session_start();
include '../config.php';
function OpenCon(){
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DB) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}
 
function CloseCon($conn){
    $conn -> close();
}

function registerUser($name, $password, $email){
    $conn = OpenCon();
    /*check if username exists*/
    $result = $conn->query('Select id FROM users WHERE username = \'' . $name .'\'');
    if(count($result->fetch_all())>0){
        echo "Username is already used.";
        CloseCon($conn);
        return false;
    }else{
        /*if user does not exist, create him*/
        $conn = OpenCon();
        $stmt = $conn->prepare('INSERT INTO users (username, password, email) VALUES (?,?,?)');
        $stmt->bind_param('sss', $name, $password, $email);
        $stmt->execute();
        $result = $conn->query('Select id FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
        $result2 = $result->fetch_all();
        $_SESSION['user_id'] = $result2[0][0];
        CloseCon($conn);
        return true;
    }
}

function loginUser($name, $password){
    $conn = OpenCon();
    /*check if username exists*/
    $result = $conn->query('Select id FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
    $result2 = $result->fetch_all();
    if(count($result2)>0){
        $_SESSION['user_id'] = $result2[0][0];
        return true;
    }else{
        /*if user does not exist, create him*/
        echo "Bad username and password.";
        return false;
    }
    CloseCon($conn);

}
?>
   
