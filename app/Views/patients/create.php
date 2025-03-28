<div class="content">
    <h2 class="text-center mb-4" style="animation: fadeIn 0.5s ease-out;">Patient Registration Form</h2>

    <!-- Add Patient Form -->
    <form method="POST" action="<?= ROOT ?>/patients/create" class="mb-4" style="animation: fadeIn 0.5s ease-out;">
        <div class="mb-3">
            <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
            <input type="number" name="age" class="form-control" placeholder="Age" required>
        </div>
        <div class="mb-3">
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" name="contact" class="form-control" placeholder="Contact" required>
        </div>
        <button type="submit" name="add_patient" class="btn btn-primary w-100">Add Patient</button>
    </form>

</div>