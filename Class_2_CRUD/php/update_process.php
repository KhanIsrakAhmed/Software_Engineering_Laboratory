<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id    = trim($_POST['studentId']);
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age   = trim($_POST['age']);

    if (!empty($id) && !empty($name) && !empty($email) && !empty($age)) {
        $stmt = $conn->prepare("UPDATE students SET name = ?, email = ?, age = ? WHERE id = ?");
        $stmt->bind_param("ssii", $name, $email, $age, $id);
        if ($stmt->execute()) {
            header("Location: read.php");
            exit;
        } else {
            echo "Error updating record.";
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
