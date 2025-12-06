<?php
include '../db.php';

$title = $_POST['title'] ?? '';
$genre = $_POST['genre'] ?? '';
$year = intval($_POST['year'] ?? 0);
$description = $_POST['description'] ?? '';

if (!$title || !$genre || !$year) {
    echo json_encode(['status'=>'error', 'message'=>'Моля попълнете всички полета!']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO movies (title, genre, year, description) VALUES (?,?,?,?)");
$stmt->bind_param("ssis", $title, $genre, $year, $description);

if ($stmt->execute()) {
    echo json_encode(['status'=>'success', 'movie_id'=>$stmt->insert_id]);
} else {
    echo json_encode(['status'=>'error']);
}
?>
