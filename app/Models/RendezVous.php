<?php
require_once __DIR__ . '/../../config/database.php';

class RendezVous {
    public static function creer($patient_id, $specialite, $date) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO rendezvous (patient_id, specialite, date, statut) VALUES (?, ?, ?, "en attente")');
        return $stmt->execute([$patient_id, $specialite, $date]);
    }

    public static function getByPatient($patient_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM rendezvous WHERE patient_id = ?');
        $stmt->execute([$patient_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function demanderAnnulation($rv_id, $patient_id) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE rendezvous SET statut = "demande_annulation" WHERE id = ? AND patient_id = ?');
        return $stmt->execute([$rv_id, $patient_id]);
    }
}
