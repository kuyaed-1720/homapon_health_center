<div class="content">
    <h2 class="text-center mb-4" style="animation: fadeIn 0.5s ease-out;">Edit Patient Record</h2>

    <!-- Add Patient Form -->
    <form method="POST" action="<?= ROOT ?>/patients/<?= $patient_id ?>" class="mb-4" style="animation: fadeIn 0.5s ease-out;">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname) ?>" required>
        </div>
        <div class="mb-3">
            <input type="number" name="age" class="form-control" value="<?php echo htmlspecialchars($age) ?>" required>
        </div>
        <div class="mb-3">
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" name="contact" class="form-control" value="<?php echo htmlspecialchars($contact) ?>" required>
        </div>
        <button type="submit" name="edit_patient" class="btn btn-primary w-100">Update Patient</button>
    </form>

</div>