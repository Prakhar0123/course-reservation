<?php
session_start();

$mail = $_POST['mail'];
$pw = $_POST['pw'];
if ($mail === "admin@gmail.com" && $pw === "admin") {
    header("Location: ahome.php");
    exit();
}
$con = new mysqli('localhost', 'root', '', 'book');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM user WHERE mail = ? AND pw = ?");
    $stmt->bind_param("ss", $mail, $pw);
    $stmt->execute();
    $stmt_res = $stmt->get_result();
    
    if ($stmt_res->num_rows > 0) {
        $data = $stmt_res->fetch_assoc();
        if ($data['pw'] === $pw) {
            $_SESSION['user_email'] = $mail;
            header("Location: home.php");
            exit();
        } else {
            echo "<h2>Invalid credentials. <a href='login.php'>Retry</a></h2>";
        }
    } else {
        echo "<h2>It looks like you're new. Please <a href='sign.php'>Sign Up</a> before using the service.</h2>";
    }

    $stmt->close();
    $con->close();
}
?>
