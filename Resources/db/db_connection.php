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
        $result = $conn->query('Select * FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
        $result2 = $result->fetch_all();
        $_SESSION['email'] = $result2[0][3];
        $_SESSION['user_id'] = $result2[0][0];
        $_SESSION['verified'] = $result2[0][4];
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        CloseCon($conn);
        return true;
    }
}

function loginUser($name, $password)
{
    $conn = OpenCon();
    /*check if username exists*/
    $result = $conn->query('Select * FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
    $result2 = $result->fetch_all();
    if (count($result2) > 0) {
        $_SESSION['email'] = $result2[0][3];
        $_SESSION['user_id'] = $result2[0][0];
        $_SESSION['verified'] = $result2[0][4];
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
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
        if (mysqli_affected_rows($conn) < 1) {
            return false;
        }
        $result = $conn->query('Select * FROM users WHERE username = \'' . $_SESSION['name'] . '\' AND password = \'' . $password . '\'');
        $result2 = $result->fetch_all();
        $_SESSION['email'] = $result2[0][3];
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
        if (mysqli_affected_rows($conn) < 1) {
            return false;
        }
        $_SESSION['password'] = $password;
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}

function verify($name, $password, $code)
{
    $conn = OpenCon();
    $sql = 'UPDATE users SET verified = \'1\' 
                                where username = \'' . $name .  '\' AND password = \'' . $password . '\' AND id = \'' . $code . '\' ';


    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) < 1) {
            return false;
        }
        $_SESSION['verified'] = '1';
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}
function deleteUser($id)
{
    $conn = OpenCon();
    $sql = 'DELETE FROM users WHERE id=' . $id;

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) < 1) {
            return false;
        }
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}

function sendMail($email)
{ //this doesn't work. Need to setup server.
    // The message
    $message = "Line 1\r\nLine 2\r\nLine 3";

    // In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

    // Send
    mail('stefanstafie99@gmail.com', 'My Subject', "vjkavsjadkbhasvhiBEJCBFKSDBFSDJKBFJKSBFJKSBJK");
}
