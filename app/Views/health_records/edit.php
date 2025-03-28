<div class="content">
    <h2 class="text-center mb-4" style="animation: fadeIn 0.5s ease-out;"><?= $patient_name ?>'s Health Record</h2>

    <!-- Update Health Record -->
    <form method="POST" action="<?= ROOT ?>/health_record/<?= $id ?>" class="mb-4" style="animation: fadeIn 0.5s ease-out;">
        <div class="mb-3">
            <textarea name="complaint" id="complaint" class="form-control" rows="4" required><?= htmlspecialchars($complaint) ?></textarea>
        </div>
        <div class="mb-3">
            <textarea name="diagnosis" id="diagnosis" class="form-control" rows="4" required><?= htmlspecialchars($diagnosis) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Health Record</button>
    </form>

</div>