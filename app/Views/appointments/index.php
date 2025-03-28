<div class="content">
    <h2 class="text-center mb-4">Appointment Section</h2>

    <a href="<?= ROOT ?>/appointment/create" class="btn btn-primary w-100">Make Appointment</a>

    <div class="appointment-table-wrapper">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor</th>
                    <th>Appointment Date</th>
                    <th>Appointment Type</th>
                    <th>Status</th>
                    <th>Completed</th>
                    <?php if ($user_role == "Health Personnel President"): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($appointments): ?>
                    <?php foreach ($appointments as $row): ?>
                        <tr>
                            <td><?= $row->name ?></td>
                            <td><?= $row->doctor ?></td>
                            <td><?= $row->appointment_date ?></td>
                            <td><?= $row->appointment_type ?></td>
                            <td><?= $row->status ?></td>
                            <td><?= $row->completed ?></td>
                            <?php if ($user_role == "Health Personnel President"): ?>
                                <td>
                                    <?php if ($row->status == "Done Appointment"): ?>
                                        <span class="badge bg-success">Done Appointment</span>
                                    <?php else: ?>
                                        <?php if ($user_role == "Health Personnel President" && $row->status == "Pending"): ?>
                                            <a href="<?= ROOT ?>/appointment/<?= $row->id ?>/approve" class="btn btn-success btn-sm">Approve</a>
                                            <a href="<?= ROOT ?>/appointment/<?= $row->id ?>/reject" class="btn btn-danger btn-sm">Reject</a>
                                        <?php elseif ($user_role == "Health Personnel President" && $row->status == "Approved"): ?>
                                            <a href="<?= ROOT ?>/appointment/<?= $row->id ?>/done" class="btn btn-primary btn-sm">Mark as Done</a>
                                        <?php endif; ?>
                                        <?php if ($user_role == "Health Personnel President"): ?>
                                            <a href="<?= ROOT ?>/appointment/<?= $row->id ?>/delete" class="btn btn-danger btn-sm">Delete</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Show or hide the 'Others' input field based on the selection
    document.getElementById('appointment_type').addEventListener('change', function() {
        const otherTypeField = document.getElementById('otherTypeField');
        if (this.value === 'Others') {
            otherTypeField.style.display = 'block';
        } else {
            otherTypeField.style.display = 'none';
        }
    });
</script>