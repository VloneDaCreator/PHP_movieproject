<?php
include '../db.php';

$title = trim($_POST['title'] ?? '');
$genre = trim($_POST['genre'] ?? '');
$year  = intval($_POST['year'] ?? 0);

if ($title === '' && $genre === '' && $year === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Няма зададен критерии!']);
    exit;
}

$query = "SELECT movie_id, title, genre, year, description FROM movies WHERE 1";
$params = [];
$types  = "";

if ($title !== '') {
    $query .= " AND title LIKE ?";
    $params[] = "%$title%";
    $types .= "s";
}

if ($genre !== '') {
    $query .= " AND genre LIKE ?";
    $params[] = "%$genre%";
    $types .= "s";
}

if ($year !== 0) {
    $query .= " AND year = ?";
    $params[] = $year;
    $types .= "i";
}

$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

echo json_encode(['status' => 'success', 'movies' => $movies]);
?>
