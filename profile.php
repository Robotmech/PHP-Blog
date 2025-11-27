<?php
require_once "manager.php";

if(!isset($_SESSION["email"]))
{
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include "navbar.php"?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 ">
            <ul class="list-group">
            <li class="list-group-item active">Account Info</li>
            <li class="list-group-item">Username: <?php echo htmlspecialchars($usersinfo["username"] ?? '', ENT_QUOTES, 'UTF-8')?></li>
            <li class="list-group-item">Email: <?php echo htmlspecialchars($usersinfo["email"] ?? '', ENT_QUOTES, 'UTF-8')?></li>
            <li class="list-group-item">Date of Registration: <?php echo htmlspecialchars($usersinfo["registerdate"] ?? '', ENT_QUOTES, 'UTF-8')?></li>
            <li class="list-group-item">Authority: <?php echo htmlspecialchars($usersinfo["authority"] ?? '', ENT_QUOTES, 'UTF-8')?></li>
            </ul>
            </div>
        </div>
    </div>
</body>
</html>