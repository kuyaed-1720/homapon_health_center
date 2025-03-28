<div class="content">
    <h2 class="text-center mb-4" style="animation: fadeIn 0.5s ease-out;">Patient Health Records</h2>

    <a href="<?= ROOT ?>/health_record/create" class="btn btn-primary w-100">Add New Health Record</a>
    <!-- Patient List -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="animation: slideUp 0.5s ease-out;">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Complaint</th>
                    <th>Diagnosis</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($health_records): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($health_records as $row): ?>
                        <tr>
                            <td><?= $patient_names[$i] ?></td>
                            <td><?= $row->complaint ?></td>
                            <td><?= $row->diagnosis ?></td>
                            <td><?= $row->date ?></td>
                            <td>
                                <a href="<?= ROOT ?>/health_record/<?= $row->id ?>/edit" class="btn btn-warning btn-sm">Edit Health Record</a>
                                <form action="<?= ROOT ?>/health_record/<?= $row->id ?>/delete" method="POST">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete Health Record</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>