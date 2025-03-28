<div class="content">
    <h2 class="text-center mb-4">Patient Records</h2>

    <a href="<?= ROOT ?>/patients/create" class="btn btn-primary w-100">Add Patient</a>
    <!-- Patient List -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="animation: slideUp 0.5s ease-out;">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($patients): ?>
                    <?php foreach ($patients as $row): ?>
                        <tr>
                            <td><?= $row->fullname ?></td>
                            <td><?= $row->age ?></td>
                            <td><?= $row->gender ?></td>
                            <td><?= $row->contact ?></td>
                            <td>
                                <a href="<?= ROOT ?>/patients/<?= $row->id ?>/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= ROOT ?>/patients/<?= $row->id ?>/delete" method="POST">
                                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                    <button type="submit" class="btn btn-danger btn-sm">Delete User</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>