<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

ob_start();
session_start();
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Content-Security-Policy: default-src 'self'; img-src 'self' https: data:; style-src 'self' https://cdn.jsdelivr.net 'unsafe-inline'; script-src 'self' https://cdn.jsdelivr.net; base-uri 'self'; form-action 'self'; frame-src https://www.youtube.com https://www.youtube-nocookie.com; child-src https://www.youtube.com https://www.youtube-nocookie.com");

if (!defined('BASE_URL')) {
    define('BASE_URL', '/NewBlog/');
}

$host = '127.0.0.1';
$dbname = 'blog';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Database connection failed';
    exit;
}


if(isset($_SESSION["email"]))
{
    $query = $db->prepare("SELECT * FROM users WHERE email=?");
    $query->execute(array($_SESSION["email"]));
    $usernumber = $query->rowCount();
    $usersinfo = $query->fetch(PDO::FETCH_ASSOC);
    if($usernumber > 0)
    {
        $username = $usersinfo["username"];
        $email = $usersinfo["email"];
        $registerdate = $usersinfo["registerdate"];
        $authority = $usersinfo["authority"];
    }
}

$query = $db->prepare("SELECT * FROM blog order by blogid desc");
$query->execute();
$bloginfo = $query->fetchAll(PDO::FETCH_ASSOC); 

if (isset($_GET['blogid'])) {
    $blogId = filter_input(INPUT_GET, 'blogid', FILTER_VALIDATE_INT);
    if ($blogId !== null && $blogId !== false) {
        $stmt = $db->prepare("SELECT * FROM blog WHERE blogid = ?");
        $stmt->execute([$blogId]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    } else {
        $info = [];
    }
}
?>

<link rel="stylesheet" href="<?= BASE_URL ?>stylesheet.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>