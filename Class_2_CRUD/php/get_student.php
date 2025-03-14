<?php

header('Content-Type: application/json');
require 'config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        echo json_encode([
            'found' => true,
            'id'    => $student['id'],
            'name'  => $student['name'],
            'email' => $student['email'],
            'age'   => $student['age']
        ]);
    } else {
        echo json_encode(['found' => false]);
    }
    $stmt->close();
} else {
    echo json_encode(['found' => false]);
}
?>
