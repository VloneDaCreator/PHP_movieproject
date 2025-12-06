<?php
include '../db.php';

$movie_id = intval($_POST['movie_id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$genre = trim($_POST['genre'] ?? '');
$year = intval($_POST['year'] ?? 0);
$description = trim($_POST['description'] ?? '');

if (!$movie_id) {
    echo json_encode(['status'=>'error', 'message'=>'Missing movie ID']);
    exit;
}

$stmt = $conn->prepare("UPDATE movies SET title=?, genre=?, year=?, description=? WHERE movie_id=?");
$stmt->bind_param("ssisi", $title, $genre, $year, $description, $movie_id);

if ($stmt->execute()) {
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error', 'message' => $stmt->error]);
}
?>
