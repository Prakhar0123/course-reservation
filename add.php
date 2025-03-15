<?php
$host = 'localhost';
$db = 'book';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCourse'])) {
    // Get form data
    $courseName = mysqli_real_escape_string($conn, $_POST['crs']);
    $courseDetails = mysqli_real_escape_string($conn, $_POST['des']);
    $checkQuery = "SELECT crs FROM course WHERE crs = '$courseName'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Course already exists. Please use a different course name.');</script>";
    } else {
        $insertQuery = "INSERT INTO course (crs, des) VALUES ('$courseName', '$courseDetails')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Course added successfully!');</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
