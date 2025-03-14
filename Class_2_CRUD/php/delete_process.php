<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['studentId']);

    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: read.php");
            exit;
        } else {
            echo "Error deleting record.";
        }
        $stmt->close();
    } else {
        echo "Invalid student ID.";
    }
} else {
    echo "Invalid request.";
}
?>
