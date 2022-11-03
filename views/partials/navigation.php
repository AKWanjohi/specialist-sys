<header class="py-1 bg-primary">
  <div class="container-sm">
    <nav class="navbar navbar-expand-sm navbar-dark">
      <a href="../index.php" class="navbar-brand fs-2 fw-bold text-uppercase">
        Specialist System
      </a>

      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav-collapsible">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav-collapsible">
        <div class="navbar-nav ms-auto fw-bold fs-5 text-uppercase">
          <?php if (!$_SESSION) : ?>
            <a href="login" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="register" class="nav-link"><i class="fas fa-user-plus"></i> Register</a>
          <?php else : ?>
            <?php if ($_SESSION['user_type'] == 'admin') : ?>
              <a href="#" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Admin Dashboard
              </a>
            <?php elseif ($_SESSION['user_type'] == 'specialist') : ?>
              <a href="#" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Specialist Dashboard
              </a>
            <?php elseif ($_SESSION['user_type'] == 'patient') : ?>
              <a href="#" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Patient Dashboard
              </a>
            <?php endif; ?>
            <form action="/logout" method="post">
              <button class="btn nav-link text-uppercase" type="submit">
                <i class="fas fa-sign-out-alt"></i>
                Logout
              </button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </nav>

  </div>

</header>