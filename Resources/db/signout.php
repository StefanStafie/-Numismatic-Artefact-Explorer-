<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="./style3.css">
    <title>PHP1</title>
</head>
<body>
    <div id = "math">You just signed out</div>
    <a href = "<?php include '../config.php'; echo URL . "index.php";?>">Back to Login/Register</a>
</body>

<?php
session_start();
$_SESSION['user_id'] = null;
?>