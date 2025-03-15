<?php
$host = 'localhost';
$db = 'book';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteQuery'])) {
    $courseName = $conn->real_escape_string($_POST['deleteQuery']);

    $conn->begin_transaction();

    try {
        // Delete from booking table
        $bookingQuery = "DELETE FROM booking WHERE crs = '$courseName'";
        if (!$conn->query($bookingQuery)) {
            throw new Exception("Error deleting from booking: " . $conn->error);
        }

        // Delete from course table
        $courseQuery = "DELETE FROM course WHERE crs = '$courseName'";
        if (!$conn->query($courseQuery)) {
            throw new Exception("Error deleting course: " . $conn->error);
        }

        $conn->commit();
        echo "Course and related bookings deleted successfully.";
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
}
$conn->close();
?>
