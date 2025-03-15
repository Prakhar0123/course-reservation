<?php
$host = 'localhost';
$db = 'book';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

if (!empty($searchQuery)) {
    $query = "SELECT * FROM course WHERE crs = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = [];
    if ($result->num_rows > 0) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }
    echo json_encode($response);

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid search query']);
}

$conn->close();
?>
