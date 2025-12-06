<?php
include '../db.php';

$movie_id = intval($_POST['movie_id'] ?? 0);

if (!$movie_id) {
    echo json_encode(['status'=>'error', 'message'=>'Missing movie ID']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM movies WHERE movie_id=?");
$stmt->bind_param("i", $movie_id);

if ($stmt->execute()) {
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error']);
}
?>
