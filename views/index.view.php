<?php require "partials/header.php" ?>
<?php require "partials/navigation.php" ?>

<main class="my-4 flex-grow-1">

  <div class="container">

    <div class="d-flex justify-content-center align-items-center">
      <div class="w-50">
        <h1>Get in touch with a specialist today!</h1>

        <p class="lead">
          With our system, you get linked to a specialist that specializes in the exact area of the ailment you are suffering from.
        </p>

        <?php if (!$_SESSION) : ?>
          <a href="/register" class="btn btn-primary btn-lg"><i class="fas fa-sign-in-alt"></i> Get Started!</a>
        <?php elseif ($_SESSION['user_type'] == 'admin') : ?>
          <a href="#" class="btn btn-success btn-lg"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <?php elseif ($_SESSION['user_type'] == 'specialist') : ?>
          <a href="#" class="btn btn-success btn-lg"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <?php elseif ($_SESSION['user_type'] == 'patient') : ?>
          <a href="#" class="btn btn-success btn-lg"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <?php endif; ?>
      </div>

      <div class="col w-50">
        <?php if (!$_SESSION) : ?>
          <img src="/static/img/doctor.jpg" alt="Doctor Image" class="img-fluid rounded">
        <?php else : ?>
          <img src="/static/img/doctor-patient.jpg" alt="Doctor Patient Image" class="img-fluid rounded">
        <?php endif; ?>
      </div>
    </div>

  </div>

</main>

<?php require "partials/footer.php"; ?>