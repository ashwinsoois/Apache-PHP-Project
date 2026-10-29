<?php
include 'db.php';

// Handle adding a new ROM entry
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_rom'])) {
    $stmt = $pdo->prepare('INSERT INTO retro_games (title, system, file_path) VALUES (?, ?, ?)');
    $stmt->execute([$_POST['title'], $_POST['system'], $_POST['file_path']]);
}

$games_stmt = $pdo->query('SELECT * FROM retro_games ORDER BY system, title');
$games = $games_stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Retro ROM Browser</title></head>
<body>
    <h2>🎮 Retro Game Library</h2>
    
    <h3>Add New ROM</h3>
    <form method="POST">
        <input type="text" name="title" placeholder="Game Title" required>
        <select name="system">
            <option value="NES">NES</option>
            <option value="SNES">SNES</option>
            <option value="N64">N64</option>
            <option value="Sega Genesis">Sega Genesis</option>
        </select>
        <input type="text" name="file_path" placeholder="Z:/Roms/game.zip" required>
        <button type="submit" name="add_rom">Catalog Game</button>
    </form>

    <h3>Your Collection</h3>
    <ul>
        <?php foreach ($games as $game): ?>
            <li><strong>[<?= $game['system'] ?>]</strong> <?= htmlspecialchars($game['title']) ?> <em>(<?= htmlspecialchars($game['file_path']) ?>)</em></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
