<?php
include 'db_connection.php';
$conn = OpenCon();
echo "Connected Successfully";

$sql = "INSERT INTO users (username, password, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


CloseCon($conn);
?>