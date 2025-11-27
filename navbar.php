<?php
require_once __DIR__ . '/manager.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE_URL ?>index.php">L'Acide</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>index.php">Home</a>
        <a class="nav-link active" href="<?= BASE_URL ?>blog/addblog.php">Write Blog</a>
        <a class="nav-link active" href="<?= BASE_URL ?>about.php">About</a>
        <a class="nav-link active" href="<?= BASE_URL ?>Port.php">Check out other Sites</a>
      </div>
    </div>
    <form class="form-inline my-2 my-lg-0">
      <?php
      if(isset($_SESSION["email"]))
      {
        if(isset($authority) && $authority == "Admin")
        {
          ?>
           <div class="nav-item">
            <a class="nav-link" href="#" role="button" aria-expanded="false">
              Admin Panel
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= BASE_URL ?>blog.php">Manage Blogs</a>
            </div>
        </div>
          <?php
        }
        ?>
        <a class="nav-link" href="<?= BASE_URL ?>profile.php">Profile</a>
        <a class="nav-link" href="<?= BASE_URL ?>logout.php">Logout</a>
        <?php
      }
      else
      {
        ?>
        <a class="nav-link" href="<?= BASE_URL ?>login.php">Login</a>
        <a class="nav-link" href="<?= BASE_URL ?>register.php">Register</a>
        <?php
      }
      ?>
    </form>
  </div>
</nav>

<?php if (!isset($_SESSION['email'])): ?>
<div class="container mt-2">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    You are not registered or logged in.
    <a href="<?= BASE_URL ?>login.php" class="alert-link">Login</a> or
    <a href="<?= BASE_URL ?>register.php" class="alert-link">Register</a>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
<?php endif; ?>