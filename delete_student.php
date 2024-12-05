<?php
require_once 'db.php';

// Check if the student ID to delete is provided
if (isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];

    // Prepare and execute the SQL to delete the student record
    $stmt = $pdo->prepare("DELETE FROM students WHERE student_id = ?");
    $stmt->execute([$studentId]);

    echo "Student record deleted successfully!";
}
?>
