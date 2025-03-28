<?php

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = new Appointment();
        $appointments = $appointment->all();

        // $patient = new Patient();
        // $patients = $patient->all();

        $user = new User();
        $users = $user->all();

        $user_role = $_SESSION['role'];

        return $this->view('appointments/index', [
            'appointments' => $appointments,
            'users' => $users,
            'user_role' => $user_role
        ]);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patient_id = intval(htmlspecialchars($_POST['patient_id']));
            $doctor = htmlspecialchars($_POST['doctor']);
            $appointment_date = $_POST['appointment_date'];
            $appointment_type = htmlspecialchars($_POST['appointment_type']);

            $patient = new Patient();
            $result = $patient->first(['id' => $patient_id]);

            $name = $result->fullname;
            $contact = $result->contact;
            $address = $result->address;

            $appointment = new Appointment();
            $appointment->insert([
                'patient_id' => $patient_id,
                'doctor' => $doctor,
                'appointment_date' => $appointment_date,
                'appointment_type' => $appointment_type,
                'name' => $name,
                'contact' => $contact,
                'address' => $address
            ]);

            header("Location: " . ROOT . "/appointment");
            exit();
        }

        $patient = new Patient();
        $patients = $patient->all();

        $user = new User();
        $users = $user->all();

        $this->view('appointments/create', ['patients' => $patients, 'users' => $users]);
    }

    public function edit($id)
    {
        $pending_appointments_count = 0;
        $patient = new Patient();
        $result = $patient->first(['id' => $id]);

        $patient_id = $id;
        $fullname = $result->fullname;
        $age = $result->age;
        $gender = $result->gender;
        $contact = $result->contact;

        $this->view('patients/edit', [
            'fullname' => $fullname,
            'age' => $age,
            'gender' => $gender,
            'contact' => $contact,
            'pending_appointments_count' => $pending_appointments_count,
            'patient_id' => $patient_id
        ]);
    }

    public function update($id)
    {
        $fullname = htmlspecialchars($_POST['fullname']);
        $age = intval(htmlspecialchars($_POST['age']));
        $gender = htmlspecialchars($_POST['gender']);
        $contact = htmlspecialchars($_POST['contact']);

        $patient = new Patient();
        $patient->update($id, [
            'fullname' => $fullname,
            'age' => $age,
            'gender' => $gender,
            'contact' => $contact,
        ]);

        header("Location: " . ROOT . "/patients");
        exit;
    }

    public function delete($id)
    {
        $patient = new Patient();
        $result = $patient->first(['id' => $id]);

        if ($result) {
            $patient->delete($id);
            header("Location: " . ROOT . "/patients");
            exit;
        }
    }
}
