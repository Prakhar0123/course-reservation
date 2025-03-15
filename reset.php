<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $no = mysqli_real_escape_string($conn, $_POST['no']);

    if (!empty($_POST['new_password'])) {
        // Update password
        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
        $update_query = "UPDATE user SET pw='$new_password' WHERE mail='$mail' AND no='$no'";
        if (mysqli_query($conn, $update_query)) {
            echo 'password_updated';
        } else {
            echo 'Error updating password: ' . mysqli_error($conn);
        }
    } else {
        // Verify user
        $query = "SELECT * FROM user WHERE mail='$mail' AND no='$no'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo 'valid';
        } else {
            echo 'invalid';
        }
    }
}
$conn->close();
?>
