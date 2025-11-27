<?php
require_once "../manager.php";

if($authority == "User")
{
    header("Location: ../index.php");
}

if(!isset($_SESSION["email"]))
{
    header("Location: ../index.php");
}

if($_GET)
{
    $blogid = filter_input(INPUT_GET, "blogid", FILTER_VALIDATE_INT);
    if ($blogid !== null && $blogid !== false) {
        $query = $db->prepare("DELETE FROM blog WHERE blogid=?");
        $query->execute(array($blogid));
    }
    header("Location: ../index.php");
}
?>