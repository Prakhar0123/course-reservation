<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_POST['course'])) {
    $mail = $_SESSION['user_email'];
    $course = trim($_POST['course']);

    $con = new mysqli('localhost', 'root', '', 'book');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $stmt = $con->prepare("INSERT INTO booking (mail, crs) VALUES (?, ?)");
    $stmt->bind_param("ss", $mail, $course);

    if ($stmt->execute()) {
        echo "You have successfully enrolled in " . $course . "!";
    } else {
        if ($con->errno === 1062) {
            echo "You are already enrolled in this course!";
        } else {
            echo "Error enrolling in course: " . $con->error;
        }
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid request. Please log in and try again.";
}
?>
