<?php

$host = 'localhost';
$dbname = 'student_management';
$username = 'root';
$password = ''; // Update if necessary

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

}

?>
