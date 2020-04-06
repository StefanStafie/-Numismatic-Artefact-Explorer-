<?php
session_start();
require_once '../config.php';
function OpenCon()
{
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DB) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

function registerUser($name, $password, $email)
{
    $conn = OpenCon();
    /*check if username exists*/
    $result = $conn->query('Select id FROM users WHERE username = \'' . $name . '\'');
    if (count($result->fetch_all()) > 0) {
        echo "Username is already used.";
        CloseCon($conn);
        return false;
    } else {
        /*if user does not exist, create him*/
        $conn = OpenCon();
        $stmt = $conn->prepare('INSERT INTO users (username, password, email) VALUES (?,?,?)');
        $stmt->bind_param('sss', $name, $password, $email);
        $stmt->execute();
        $result = $conn->query('Select id FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
        $result2 = $result->fetch_all();
        $_SESSION['user_id'] = $result2[0][0];
        $_SESSION['name'] = $name;
        CloseCon($conn);
        return true;
    }
}

function loginUser($name, $password)
{
    $conn = OpenCon();
    /*check if username exists*/
    $result = $conn->query('Select id FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
    $result2 = $result->fetch_all();
    if (count($result2) > 0) {
        $_SESSION['user_id'] = $result2[0][0];
        $_SESSION['name'] = $name;
        return true;
    } else {
        /*if user does not exist, create him*/
        echo "Bad username and password.";
        return false;
    }
    CloseCon($conn);
}

function changeEmail($email, $password)
{
    $conn = OpenCon();
    $sql = 'UPDATE users SET email = \'' . $email . '\' 
                                where id = \'' . $_SESSION['user_id'] .  '\' AND password = \'' . $password . '\'';
    
        
    if (mysqli_query($conn, $sql)) {
        if(mysqli_affected_rows($conn) <1){
            return false;
        }
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}

function changePassword($old, $password)
{
    $conn = OpenCon();
    $sql = 'UPDATE users SET password = \'' . $password . '\' 
                                where id = \'' . $_SESSION['user_id'] .  '\' AND password = \'' . $old . '\'';
    
        
    if (mysqli_query($conn, $sql)) {
        if(mysqli_affected_rows($conn) <1){
            return false;
        }
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}