<?php
include '../db.php';

$result = $conn->query("SELECT movie_id, title, genre, year, description FROM movies ORDER BY movie_id DESC");

$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

echo json_encode(['status'=>'success', 'movies'=>$movies]);
?>
