<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'get_total_users') {
        //count total users
        $sql = "SELECT COUNT(mail) AS total_users FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['total_users'];
        } else {
            echo "0";
        }
    } elseif ($_GET['action'] == 'get_new_users_today') {
        // new regs
        $sql = "SELECT COUNT(mail) AS new_users_today FROM user WHERE DATE(dt) = CURDATE()";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['new_users_today'];
        } else {
            echo "0";
        }
    } elseif ($_GET['action'] == 'get_total_courses') {
        // Count total courses
        $sql = "SELECT COUNT(*) AS total_courses FROM course";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['total_courses'];
        } else {
            echo "0";
        }
    }
    $conn->close();
    exit();
}

$mail = $_POST['mail'];
$pw = $_POST['pw'];
$no = $_POST['no'];

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format. Please enter a valid email.";
    exit();
}
$sql = "INSERT INTO user (mail, pw, no, dt) VALUES ('$mail', '$pw', '$no', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
