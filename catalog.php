<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_media'])) {
    $stmt = $pdo->prepare('INSERT INTO media_catalog (title, media_type, genre, location_or_shelf) VALUES (?, ?, ?, ?)');
    $stmt->execute([$_POST['title'], $_POST['media_type'], $_POST['genre'], $_POST['location']]);
}

$catalog = $pdo->query('SELECT * FROM media_catalog ORDER BY media_type, title')->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Media Catalog</title></head>
<body>
    <h2>📚 Book & Movie Asset Catalog</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <select name="media_type">
            <option value="Book">Book</option>
            <option value="Movie">Movie</option>
        </select>
        <input type="text" name="genre" placeholder="Genre">
        <input type="text" name="location" placeholder="Living Room Shelf A">
        <button type="submit" name="add_media">Save to Catalog</button>
    </form>

    <h3>Inventory List</h3>
    <ul>
        <?php foreach ($catalog as $item): ?>
            <li><strong><?= $item['media_type'] ?>:</strong> <?= htmlspecialchars($item['title']) ?> | Genre: <?= htmlspecialchars($item['genre']) ?> | Located: <?= htmlspecialchars($item['location_or_shelf']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
