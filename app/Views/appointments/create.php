<div class="content">
    <h2 class="text-center mb-4">Appointment Scheduling</h2>

    <form method="POST" action="<?= ROOT ?>/appointment/create" class="mb-4">
        <div class="mb-3">
            <select name="patient_id" class="form-control" required>
                <option value="">Select Patient</option>
                <?php foreach ($patients as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->fullname ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <select name="doctor" class="form-control" required>
                <option value="">Select BHW</option>
                <?php foreach ($users as $row): ?>
                    <option value="<?= $row->fullname ?>"><?= $row->fullname ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="datetime-local" name="appointment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <select name="appointment_type" id="appointment_type" class="form-control" required>
                <option value="">Select Appointment Type</option>
                <option value="Dental">Dental</option>
                <option value="Health">Health</option>
                <option value="Mental">Mental</option>
                <option value="Pediatric">Pediatric</option>
                <option value="General Checkup">General Checkup</option>
                <option value="Vaccination">Vaccination</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Schedule Appointment</button>
    </form>
</div>