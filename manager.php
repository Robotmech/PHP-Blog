<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

ob_start();
session_start();

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
    echo 'Database connection failed: ' . $e->getMessage();
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
$blognumber = $query->rowCount();
$bloginfo = $query->fetchAll(PDO::FETCH_ASSOC);

if($_GET)
{
    $blogid = intval($_GET["blogid"]);
    $query = $db->prepare("SELECT * FROM blog WHERE blogid=?");
    $query->execute(array($_GET["blogid"]));
    $info = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="<?= BASE_URL ?>stylesheet.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>