<?php
require_once 'db.php';

// Query to fetch all enrollments
$stmt = $pdo->query("
    SELECT students.first_name, students.last_name, courses.course_name
    FROM enrollments
    JOIN students ON enrollments.student_id = students.student_id
    JOIN courses ON enrollments.course_id = courses.course_id
");
$enrollments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output as JSON for use in JavaScript
echo json_encode($enrollments);
?>
