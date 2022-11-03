<?php require "partials/header.php" ?>
<?php require "partials/navigation.php" ?>

<main class="my-4 flex-grow-1">
    <div class="container">
        <form action="/register" method="POST" class="w-75 mx-auto p-3 border rounded shadow-sm">
            <h1 class="pb-3 fs-2 fw-bold text-center text-primary text-uppercase border-3 border-bottom border-primary">
                <i class="fas fa-user-plus"></i>
                Register
            </h1>

            <?php if ($message) : ?>
                <div class="alert alert-danger">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="user_type" class="form-label fw-bold text-uppercase">User Type:</label>
                <select name="user_type" id="user_type" class="form-select" required>
                    <option value="">Select user type...</option>
                    <?php if (!$admin) : ?>
                        <option value="admin" <?php echo $user_type == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <?php endif; ?>
                    <option value="patient" <?php echo $user_type == 'patient' ? 'selected' : '' ?>>Patient</option>
                    <option value="specialist" <?php echo $user_type == 'specialist' ? 'selected' : '' ?>>Specialist</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="full_name" class="form-label fw-bold text-uppercase">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" value="<?php echo $full_name ?>" placeholder="Enter full name" required>
                </div>
                <div class="col">
                    <label for="username" class="form-label fw-bold text-uppercase">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" placeholder="Enter username" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="mobile" class="form-label fw-bold text-uppercase">Phone Number:</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $mobile ?>" maxlength="10" placeholder="Enter phone number" required>
                </div>
                <div class="col">
                    <label for="email" class="form-label fw-bold text-uppercase">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>" placeholder="Enter email" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="gender" class="form-label fw-bold text-uppercase">Gender:</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="">Select gender...</option>
                        <option value="male" <?php echo $gender == 'male' ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?php echo $gender == 'female' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="col-6 d-none" id="common_fields">
                    <label for="location" class="form-label fw-bold text-uppercase">Location:</label>
                    <input type="text" name="location" id="location" class="form-control" value="<?php echo $location ?>" placeholder="Enter location">
                </div>
            </div>

            <div class="row mb-3 d-none" id="patient_fields">
                <div class="col-6">
                    <label for="dob" class="form-label fw-bold text-uppercase">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $dob ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="password" class="form-label fw-bold text-uppercase">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="col">
                    <label for="confirm_password" class="form-label fw-bold text-uppercase">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
                </div>
            </div>

            <div class="mb-3">
                <button type="reset" class="btn btn-secondary"><i class="fas fa-redo"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</button>
            </div>

            <p>Already have an account? <a href="/login" class="link-primary">Login</a></p>
        </form>

    </div>

</main>

<script src="/static/js/register.js"></script>

<?php require "partials/footer.php"; ?>