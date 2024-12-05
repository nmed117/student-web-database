<?php
require_once 'db.php';

// Query to fetch all grades
$stmt = $pdo->query("
    SELECT students.first_name, students.last_name, courses.course_name, grades.grade
    FROM grades
    JOIN students ON grades.student_id = students.student_id
    JOIN courses ON grades.course_id = courses.course_id
");
$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output as JSON for use in JavaScript
echo json_encode($grades);
?>
