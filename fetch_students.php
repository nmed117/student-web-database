// fetch_students.php
<?php
require_once 'db.php';

// Query to fetch all students
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output as a JSON response
echo json_encode($students);
?>
