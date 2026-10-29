<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏠 Home Server Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 40px; text-align: center; color: #333; }
        h1 { color: #2c3e50; margin-bottom: 30px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; max-width: 1000px; margin: 0 auto; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); text-decoration: none; color: inherit; transition: transform 0.2s, box-shadow 0.2s; border-top: 5px solid #3498db; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.1); }
        .card h3 { margin-top: 0; color: #2c3e50; font-size: 1.4rem; }
        .card p { color: #7f8c8d; font-size: 0.95rem; line-height: 1.4; }
        .net { border-top-color: #2ecc71; }
        .rom { border-top-color: #e74c3c; }
        .cat { border-top-color: #f1c40f; }
        .rec { border-top-color: #9b59b6; }
    </style>
</head>
<body>

    <h1>🏠 Home Server Dashboard</h1>
    
    <div class="grid">
        <a href="network.php" class="card net">
            <h3>📡 Network Monitor</h3>
            <p>Track live statuses and network connectivity for your local devices.</p>
        </a>
        
        <a href="roms.php" class="card rom">
            <h3>🎮 Retro ROM Browser</h3>
            <p>Browse, manage, and catalog your vintage game backup collection.</p>
        </a>
        
        <a href="catalog.php" class="card cat">
            <h3>📚 Media Catalog</h3>
            <p>Keep track of your physical books, movies, and items loaned to friends.</p>
        </a>
        
        <a href="recipes.php" class="card rec">
            <h3>🍳 Recipe Box</h3>
            <p>Access your family cookbook and manage weekly dinner plans.</p>
        </a>
    </div>

</body>
</html>
