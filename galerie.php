<?php
$dir = __DIR__ . '/snapshots';
$files = glob($dir . '/snapshot_*.jpg');
usort($files, function($a, $b) {
    return filemtime($b) - filemtime($a); // tri par date décroissante
});
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Galerie des photos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 30px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        .photo {
            border: 2px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            background-color: white;
        }
        .photo img {
            width: 100%;
            height: auto;
            display: block;
        }
        .photo p {
            margin: 0;
            padding: 10px;
            font-size: 14px;
            color: #555;
            background-color: #f9f9f9;
        }
        a.button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Galerie des snapshots Tapo C310</h1>
    <a href="index.php" class="button">← Retour à la caméra</a>

    <div class="gallery">
        <?php if (count($files) === 0): ?>
            <p>Aucune photo disponible pour le moment.</p>
        <?php else: ?>
            <?php foreach ($files as $file): ?>
                <div class="photo">
                    <img src="snapshots/<?php echo basename($file); ?>" alt="Snapshot">
                    <p><?php echo date("d/m/Y H:i:s", filemtime($file)); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
