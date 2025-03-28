<div class="login-container">
    <div class="login-card card">
        <img src="<?= ROOT ?>/assets/img/logo.jpg" alt="Logo" class="logo">
        <div class="clinic-name">Barangay Health Center Monitoring System</div>

        <?php if (isset($error) && $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        } ?>
        <form method="POST" action="<?= ROOT ?>/auth/login">
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <span class="input-group-text" onclick="togglePassword()">
                        <i id="eyeIcon" class="bi bi-eye-slash"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <!-- Changed Register button to Appointment button -->
            <a href="http://localhost/barangay_health/appointment_form.php" class="btn btn-appointment w-100 mt-2">Make Appointment</a>
        </form>

    </div>
</div>