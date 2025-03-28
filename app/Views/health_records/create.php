<div class="content">
    <h2 class="text-center mb-4" style="animation: fadeIn 0.5s ease-out;">Patient Health Record Form</h2>

    <!-- Add Patient Form -->
    <form method="POST" action="<?= ROOT ?>/health_record/create" class="mb-4" style="animation: fadeIn 0.5s ease-out;">
        <div class="mb-3">
            <select name="patient_id" id="patient" class="form-control" required>
                <option value="">Select a Patient</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= htmlspecialchars($patient->id) ?>"><?= $patient->fullname ?></option>
                <?php endforeach ?>
        </div>
        <div class="mb-3">
            <textarea name="complaint" id="complaint" placeholder="Input the complaint here..." class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <textarea name="diagnosis" id="diagnosis" placeholder="Input the diagnosis here..." class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" name="add_patient" class="btn btn-primary w-100">Add Patient</button>
    </form>

</div>