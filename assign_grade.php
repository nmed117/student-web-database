<?php
require_once 'db.php';

// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $courseId = $_POST['course_id'];
    $grade = $_POST['grade'];

    // Insert grade into the grades table
    $stmt = $pdo->prepare("INSERT INTO grades (student_id, course_id, grade) VALUES (?, ?, ?)");
    $stmt->execute([$studentId, $courseId, $grade]);

    echo "Grade assigned successfully!";
}
?>
