<?php
require_once __DIR__ . '/../Models/RendezVous.php';


require_once __DIR__ . '/../Models/Patient.php';

class PatientController {
    public function login($patient_id) {
        return Patient::findById($patient_id);
    }

    public function register($nom, $prenom, $email, $telephone) {
        return Patient::create($nom, $prenom, $email, $telephone);
    }

    public function demanderRV($patient_id, $specialite, $date) {
        return RendezVous::creer($patient_id, $specialite, $date);
    }

    public function mesRV($patient_id) {
        return RendezVous::getByPatient($patient_id);
    }

    public function annulerRV($rv_id, $patient_id) {
        return RendezVous::demanderAnnulation($rv_id, $patient_id);
    }
}
