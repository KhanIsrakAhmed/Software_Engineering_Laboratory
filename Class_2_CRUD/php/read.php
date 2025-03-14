<?php
require 'config.php';

$sql = "SELECT * FROM students ORDER BY id ASC";
$result = $conn->query($sql);

$students = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Records</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
    <h1>Student Records</h1>
    <table class="data-table">
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Age</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students)): ?>
          <?php foreach ($students as $student): ?>
            <tr>
              <td><?= htmlspecialchars($student['id']) ?></td>
              <td><?= htmlspecialchars($student['name']) ?></td>
              <td><?= htmlspecialchars($student['email']) ?></td>
              <td><?= htmlspecialchars($student['age']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No records found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    <button class="back-btn" onclick="location.href='../index.html'">Back to Home</button>
  </div>
</body>
</html>
