<?php
require_once 'db.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id']; // The ID of the student being edited
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

    // Prepare an SQL statement to update the student record
    $stmt = $pdo->prepare("UPDATE students SET first_name = ?, last_name = ?, email = ? WHERE student_id = ?");
    $stmt->execute([$firstName, $lastName, $email, $studentId]);

    echo "Student record updated successfully!";
}
?>
