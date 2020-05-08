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

function databaseToSession($worker){
    $_SESSION['user_id'] = $worker[0][0];
    $_SESSION['name'] = $worker[0][1];
    $_SESSION['password'] = $worker[0][2];
    $_SESSION['firstName'] = $worker[0][3];
    $_SESSION['lastName'] = $worker[0][4];
    $_SESSION['email'] = $worker[0][5];
    $_SESSION['verified'] = $worker[0][6];
}
function registerUser($firstName, $lastName, $name, $password, $email)
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
        $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, username, password, email) VALUES (?,?,?,?,?)');
        $stmt->bind_param('sssss', $firstName, $lastName, $name, $password, $email);
        $stmt->execute();
        $result = $conn->query('Select * FROM users WHERE username = \'' . $name . '\' AND password = \'' . $password . '\'');
        $result2 = $result->fetch_all();
        databaseToSession($result2);
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
        databaseToSession($result2  );
        return true;
    } else {
        /*if user does not exist, error*/
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
        databaseToSession($result2);
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

//-------------------------------------------------------COINS------------------------------------

function getFirstCoins($limit)
{
    $conn = OpenCon();
    $result = $conn->query("Select * FROM coins LIMIT " . $limit  );
    if(!$result)
        return false;
    return $result->fetch_all();
    CloseCon($conn);
}

function getMyCoins($limit)
{
    $conn = OpenCon();
    $result = $conn->query("SELECT * FROM coins c join user_coins u on c.identifier = u.id_coin where u.id_user = " .  $_SESSION['user_id'] . " LIMIT" . $limit  );
    if(!$result)
        return false;
    return $result->fetch_all();
    CloseCon($conn);
}

function addCoin($identifier, $diameter, $weight, $axis, $collection, $coinUrl, $collUrl, $obverse, $reverse)
{
    $conn = OpenCon();
    $stmt = $conn->prepare('INSERT INTO coins (identifier, diameter, weight, axis, collection, object, col_uri, obv_ref, rev_ref) VALUES (?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssssss', $identifier, $diameter, $weight, $axis, $collection, $coinUrl, $collUrl, $obverse, $reverse);
    $stmt->execute();
    CloseCon($conn);
    return true;

}