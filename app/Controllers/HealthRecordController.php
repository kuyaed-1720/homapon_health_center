<?php

class HealthRecordController extends Controller
{
    public function index()
    {
        $health_record = new HealthRecord();
        $health_records = $health_record->all();

        foreach ($health_records as $row) {
            $patient = new Patient();
            $result = $patient->first(['id' => $row->patient_id]);


            if ($result) {
                $patient_names[] = $result->fullname;
            }
        }

        return $this->view('health_records/index', [
            'health_records' => $health_records,
            'patient_names' => $patient_names
        ]);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patient_id = intval(htmlspecialchars($_POST['patient_id']));
            $complaint = htmlspecialchars($_POST['complaint']);
            $diagnosis = htmlspecialchars($_POST['diagnosis']);

            $health_record = new HealthRecord();
            $health_record->insert([
                'patient_id' => $patient_id,
                'complaint' => $complaint,
                'diagnosis' => $diagnosis,
            ]);

            header("Location: " . ROOT . "/health_record");
            exit();
        }

        $patient = new Patient();
        $patients = $patient->all();

        $this->view('health_records/create', ['patients' => $patients]);
    }

    public function edit($id)
    {
        $patient = new Patient();
        $health_record = new HealthRecord();
        $result = $health_record->first(['id' => $id]);
        $patient = $patient->first(['id' => $result->patient_id]);

        $patient_id = $result->patient_id;
        $patient_name = $patient->fullname;
        $complaint = $result->complaint;
        $diagnosis = $result->diagnosis;

        $this->view('health_records/edit', [
            'id' => $id,
            'patient_name' => $patient_name,
            'complaint' => $complaint,
            'diagnosis' => $diagnosis,
        ]);
    }

    public function update($id)
    {
        $complaint = htmlspecialchars($_POST['complaint']);
        $diagnosis = htmlspecialchars($_POST['diagnosis']);

        $health_record = new HealthRecord();
        $health_record->update($id, [
            'complaint' => $complaint,
            'diagnosis' => $diagnosis
        ]);

        header("Location: " . ROOT . "/health_record");
        exit;
    }

    public function delete($id)
    {
        $health_record = new HealthRecord();
        $result = $health_record->first(['id' => $id]);

        if ($result) {
            $health_record->delete($id);
            header("Location: " . ROOT . "/health_record");
            exit;
        }
    }
}
