<?php
require_once "manager.php";
?>

<?php 
    $pdo = new PDO('mysql:host=10.10.20.188;dbname=urs', 'bljuser', 'hallo123', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    $stmt = $pdo->prepare('select *  from bljblogs');
    $stmt->execute();
    $bloggers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php include "navbar.php"?>
    <ul>
    <?php foreach ($bloggers as $blogger) : ?> 
        <li> 
            <a target="_blank" href="<?= $blogger["blog_url"]?>"><?= $blogger["name_lernender"] ?></a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
