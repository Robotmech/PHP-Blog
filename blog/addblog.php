<?php
require_once "../manager.php";

if(!isset($_SESSION["email"]))
{
    header("Location: ../index.php");
}

if($_POST)
{
    $title = trim($_POST["title"] ?? '');
    $text = trim($_POST["text"] ?? '');
    $image_url = trim($_POST["image_url"] ?? '');
    $titlenumber = strlen($title);

    if($titlenumber > 80) {
        $errormsg = "Title is too long.";
    } else {
        if($title !== "" && $text !== "") {
            if ($image_url !== "" && !filter_var($image_url, FILTER_VALIDATE_URL)) {
                $errormsg = "Enter a valid image URL (http/https).";
            } else {
                $stmt = $db->prepare("INSERT INTO blog (blogtitle, blogtext, user, time, image_url) VALUES (?, ?, ?, ?, ?)");
                $ok = $stmt->execute([
                    $title,
                    $text,
                    $username,
                    date("Y-m-d H:i:s"),
                    $image_url !== "" ? $image_url : null
                ]);
                $errormsg = $ok ? "Text Added." : "Could not add text.";
            }
        } else {
            $errormsg = "Do not leave empty space!";
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include "../navbar.php"?>
    <div class="container mt-3">
      <div class="row">
      <div class="col-md-12 mx-auto">
        <form method="POST" enctype="application/x-www-form-urlencoded">
            <input type="text" name="title" class="form-control" placeholder="Title">
            <textarea name="text" class="form-control mt-1" cols="30" rows="10" placeholder="Text"></textarea>
            <input type="url" class="form-control mt-1" name="image_url" placeholder="Image URL (optional)" pattern="https?://.*">
            <?php
                if(!empty($errormsg))
                {
                    ?>
                    <div class="alert alert-success mt-1" role="alert">
                    <?php echo htmlspecialchars($errormsg);?>
                    </div>
                    <?php
                }
            ?>
            <button type="submit" class="btn btn-warning mt-1">Publish</button>
        </form>
      </div>
      </div>
    </div>
</body>
</html>