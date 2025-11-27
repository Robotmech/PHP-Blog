<?php
require_once "../manager.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($info["blogtitle"] ?? '', ENT_QUOTES, 'UTF-8');?></title>
  </head>
  <body>
    <?php include "../navbar.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-1-12 mx-auto">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($info["blogtitle"] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                <?php if (!empty($info["image_url"])): ?>
                <img src="<?php echo htmlspecialchars($info["image_url"], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:400px; max-height:400px;" class="img-fluid mt-2" alt="" loading="lazy">
                <?php endif; ?>
                <p class="card-text text-break mt-2"><?php echo nl2br(htmlspecialchars($info["blogtext"] ?? '', ENT_QUOTES, 'UTF-8')); ?></p>
                <?php
                if($authority == "Admin")
                {
                    ?>
                    <a href="editblog.php?blogid=<?php echo $info["blogid"];?>">Edit</a>
                    <a href="deleteblog.php?blogid=<?php echo $info["blogid"];?>">Delete</a>
                    <?php
                }
                ?>
            </div>
            </div>
            </div>
        </div>
    </div>
  </body>
</html>