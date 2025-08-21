<?php
require_once __DIR__ . '/../../config/database.php';


class Patient {
    public static function findById($patient_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patients WHERE id = ?');
        $stmt->execute([$patient_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByEmail($email) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patients WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($nom, $prenom, $email, $telephone) {
        global $pdo;
        // Validation des champs
        if (empty($nom) || empty($prenom) || empty($email) || empty($telephone)) {
            return ["error" => "Tous les champs sont obligatoires."];
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ["error" => "Email invalide."];
        }
        if (!preg_match('/^[0-9]{8,15}$/', $telephone)) {
            return ["error" => "Téléphone invalide."];
        }
        // Vérifier unicité email
        if (self::findByEmail($email)) {
            return ["error" => "Cet email existe déjà."];
        }
        $stmt = $pdo->prepare('INSERT INTO patients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nom, $prenom, $email, $telephone]);
        return $pdo->lastInsertId();
    }
}
