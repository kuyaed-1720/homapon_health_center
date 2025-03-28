<?php

class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . ROOT . "/auth/login");
            exit();
        }

        $appointment = new Appointment();
        $pending_appointments = $appointment->where(['status' => 'Pending']);
        $approved_appointments = $appointment->where(['status' => 'Approved']);
        $rejected_appointments = $appointment->where(['status' => 'Rejected']);
        $done_appointments = $appointment->where(['status' => 'Done Appointment']);

        $pending_appointments = $pending_appointments ? count($pending_appointments) : 0;
        $approved_appointments = $approved_appointments ? count($approved_appointments) : 0;
        $rejected_appointments = $rejected_appointments ? count($rejected_appointments) : 0;
        $done_appointments = $done_appointments ? count($done_appointments) : 0;

        $status_data = [
            'pending' => $pending_appointments,
            'approved' => $approved_appointments,
            'rejected' => $rejected_appointments,
            'done' => $done_appointments
        ];

        $user_id = $_SESSION['user_id'];

        $this->view('dashboard', [
            'user_id' => $user_id,
            'status_data' => $status_data
        ]);
    }
}
