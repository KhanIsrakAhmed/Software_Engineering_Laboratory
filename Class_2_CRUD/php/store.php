<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age   = trim($_POST['age']);

    if (!empty($name) && !empty($email) && !empty($age)) {
        $stmt = $conn->prepare("INSERT INTO students (name, email, age) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $email, $age);
        if ($stmt->execute()) {
            header("Location: read.php");
            exit;
        } else {
            echo "Error inserting record.";
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
