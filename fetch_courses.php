// fetch_courses.php
<?php
require_once 'db.php';

// Query to fetch all courses
$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output as a JSON response
echo json_encode($courses);
?>
