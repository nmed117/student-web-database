<?php
require_once 'db.php';

// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $courseId = $_POST['course_id'];

    // Insert enrollment into the enrollments table
    $stmt = $pdo->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)");
    $stmt->execute([$studentId, $courseId]);

    echo "Student enrolled successfully!";
}
?>
