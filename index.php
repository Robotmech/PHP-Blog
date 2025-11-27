<?php
require_once "manager.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include "navbar.php"?>
    <div class="container mt-3">
      <div class="row">
      <div class="col-md-8 mx-auto">
        <?php
          foreach($bloginfo as $blog)
          {
            $numberofcharacters = strlen($blog["blogtext"]);
            ?>
            
              <div class="card mt-1">
              <div class="card-body">
                <a href="blog/blog.php?blogid=<?php echo (int)$blog["blogid"];?>"><h5 class="card-title text-dark"><?php echo htmlspecialchars($blog["blogtitle"], ENT_QUOTES, 'UTF-8'); ?></h5></a>
                <?php if (!empty($blog["image_url"])): ?>
                  <img src="<?php echo htmlspecialchars($blog["image_url"], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:400px; max-height:400px;" class="img-fluid mt-2" alt="" loading="lazy">
                <?php endif; ?>
                <?php
                 if($numberofcharacters > 200)
                 {
                      echo htmlspecialchars(substr($blog["blogtext"],0,350), ENT_QUOTES, 'UTF-8') ."...";
                    ?>
                    <form method="get">
                      <a href="blog/blog.php?blogid=<?php echo (int)$blog["blogid"];?>">Read more</a>
                    </form>
                    <?php
                 }
                 else
                 {
                  ?>
                    <p class="card-text"><?php echo htmlspecialchars($blog["blogtext"], ENT_QUOTES, 'UTF-8') ?></p>
                  <?php
                 }
                ?>
              </div>
              <div class="card-footer">
                Submitted by: <a class="text-secondary "><?php echo htmlspecialchars($blog["user"], ENT_QUOTES, 'UTF-8')?></a>
                Add Date: <a class="text-secondary "><?php echo htmlspecialchars($blog["time"], ENT_QUOTES, 'UTF-8')?></a>
              </div>
              </div>
            <?php
          }
        ?>
      </div>
      </div>
    </div>
</body>
</html>