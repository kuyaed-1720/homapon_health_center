<?php

class PatientController extends Controller
{
    public function index()
    {
        $patient = new Patient();
        $patients = $patient->all();
        $pending_appointments_count = 0;

        return $this->view('patients/index', [
            'pending_appointments_count' => $pending_appointments_count,
            'patients' => $patients
        ]);
    }

    public function create()
    {
        $pending_appointments_count = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = htmlspecialchars($_POST['fullname']);
            $age = intval(htmlspecialchars($_POST['age']));
            $gender = htmlspecialchars($_POST['gender']);
            $contact = htmlspecialchars($_POST['contact']);

            $patient = new Patient();
            $patient->insert([
                'fullname' => $fullname,
                'age' => $age,
                'gender' => $gender,
                'contact' => $contact
            ]);

            header("Location: " . ROOT . "/patients");
            exit();
        }

        $this->view('patients/create', ['pending_appointments_count' => $pending_appointments_count]);
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
