<?php
include 'db.php';

$movie_id = intval($_GET['movie_id'] ?? 0);

if ($movie_id <= 0) {
    echo "<p style='color:red; text-align:center;'>Невалидно ID на филма.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $year = intval($_POST['year'] ?? 0);
    $description = $_POST['description'] ?? '';

    if ($title && $genre && $year && $description) {
        $stmt = $conn->prepare("UPDATE movies SET title = ?, genre = ?, year = ?, description = ? WHERE movie_id = ?");
        $stmt->bind_param("ssisi", $title, $genre, $year, $description, $movie_id);
        $stmt->execute();
        $stmt->close();

        $success = "Филмът беше успешно актуализиран!";
    } else {
        $error = "Моля, попълнете всички полета!";
    }
}

$stmt = $conn->prepare("SELECT movie_id, title, genre, year, description FROM movies WHERE movie_id = ?");
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p style='color:red; text-align:center;'>Филмът не е намерен.</p>";
    exit;
}

$movie = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактиране на филм: <?php echo htmlspecialchars($movie['title']); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Редактиране на филм</h1>

    <?php if (!empty($success)) : ?>
        <p style="color: #00ff00; text-align:center; font-weight:bold;"><?php echo $success; ?></p>
    <?php endif; ?>

    <?php if (!empty($error)) : ?>
        <p style="color: #ff3b3b; text-align:center; font-weight:bold;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" style="margin-top:20px;">
        <label>Заглавие:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>

        <label>Жанр:</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($movie['genre']); ?>" required>

        <label>Година:</label>
        <input type="number" name="year" value="<?php echo htmlspecialchars($movie['year']); ?>" required>

        <label>Описание:</label>
        <textarea name="description" rows="4" required><?php echo htmlspecialchars($movie['description']); ?></textarea>

        <button type="submit">Запази промените</button>
    </form>

    <div style="margin-top:20px; text-align:center;">
        <a href="index.html" style="display:inline-block; padding:10px 20px; background:#ff3b3b; color:#fff; border-radius:5px; text-decoration:none; font-family:'Nosifer', cursive;">Обратно към списъка</a>
    </div>
</div>
</body>
</html>
