<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_recipe'])) {
    $stmt = $pdo->prepare('INSERT INTO recipes (title, category, ingredients, instructions) VALUES (?, ?, ?, ?)');
    $stmt->execute([$_POST['title'], $_POST['category'], $_POST['ingredients'], $_POST['instructions']]);
}

$recipes = $pdo->query('SELECT * FROM recipes ORDER BY category, title')->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Recipe Box</title></head>
<body>
    <h2>🍳 Family Recipe Manager</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Recipe Name" required><br><br>
        <input type="text" name="category" placeholder="Dinner, Breakfast, Dessert"><br><br>
        <textarea name="ingredients" placeholder="Ingredients (one per line)"></textarea><br><br>
        <textarea name="instructions" placeholder="Cooking steps..."></textarea><br><br>
        <button type="submit" name="add_recipe">Save Recipe</button>
    </form>

    <h3>Saved Recipes</h3>
    <?php foreach ($recipes as $recipe): ?>
        <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;">
            <h4><?= htmlspecialchars($recipe['title']) ?> (<em><?= htmlspecialchars($recipe['category']) ?></em>)</h4>
            <p><strong>Ingredients:</strong> <?= nl2br(htmlspecialchars($recipe['ingredients'])) ?></p>
            <p><strong>Instructions:</strong> <?= nl2br(htmlspecialchars($recipe['instructions'])) ?></p>
        </div>
    <?php endphp ?>
    <?php endforeach; ?>
</body>
</html>
