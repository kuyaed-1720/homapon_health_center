<div class="content">
    <p>Welcome, <?php echo $_SESSION['fullname']; ?>!</p>
    <p>Role: <?php echo $_SESSION['role']; ?></p>

    <div class="clock" id="clock"></div>
    <!-- Current Date and Day -->
    <div id="currentDate"></div>

    <!-- Appointment Status Cards -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="status-card bg-warning">
                <h5>Pending Appointments</h5>
                <div class="count"><?= $status_data['pending'] ?></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="status-card bg-success">
                <h5>Approved Appointments</h5>
                <div class="count"><?= $status_data['approved'] ?></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="status-card bg-danger">
                <h5>Rejected Appointments</h5>
                <div class="count"><?= $status_data['rejected'] ?></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="status-card bg-info">
                <h5>Done Appointments</h5>
                <div class="count"><?= $status_data['done'] ?></div>
            </div>
        </div>
    </div>

    <!-- Appointment Status Bar Chart -->
    <div class="report-box mt-4">
        <h4>Appointment Status Report</h4>
        <canvas id="appointmentStatusChart"></canvas>
    </div>
</div>

<!-- Scripts -->
<script>
    // Current Time Update
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
    }

    // Current Date and Day
    function updateDate() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('currentDate').textContent = now.toLocaleDateString(undefined, options);
    }

    setInterval(updateClock, 1000);
    updateClock(); // Initial call to show the clock
    updateDate(); // Initial call to show date and day

    // Appointment Status Chart (Bar chart)
    var ctx = document.getElementById('appointmentStatusChart').getContext('2d');
    var appointmentStatusChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Approved', 'Rejected', 'Done'],
            datasets: [{
                data: [<?= $status_data['pending'] ?>,
                    <?= $status_data['approved'] ?>,
                    <?= $status_data['rejected'] ?>,
                    <?= $status_data['done'] ?>,
                ],
                backgroundColor: ['#ffc107', '#28a745', '#dc3545', '#17a2b8'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>