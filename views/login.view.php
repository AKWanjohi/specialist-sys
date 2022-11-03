<?php require "partials/header.php" ?>
<?php require "partials/navigation.php" ?>

<main class="my-4 flex-grow-1">
    <div class="container">
        <form action="/login" method="POST" class="w-50 mx-auto p-3 border rounded shadow-sm">
            <h1 class="pb-3 fs-2 fw-bold text-center text-primary text-uppercase border-3 border-bottom border-primary">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </h1>

            <?php if ($message) : ?>
                <div class="alert alert-danger">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="username" class="form-label fw-bold text-uppercase">Username:</label>
                <div class="input-group">
                    <span class="input-group-text text-primary"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" placeholder="Enter username" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold text-uppercase">Password:</label>
                <div class="input-group">
                    <span class="input-group-text text-primary"><i class="fas fa-key"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>
            </div>

            <div class="mb-3">
                <button type="reset" class="btn btn-secondary">
                    <i class="fas fa-redo"></i>
                    Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
            </div>

            <p>Don't have an account? <a href="/register" class="link-primary">Register Now</a></p>
        </form>

    </div>

</main>

<?php require "partials/footer.php"; ?>