<?php
session_start();
require_once __DIR__ . '/../app/Controllers/PatientController.php';

$controller = new PatientController();

// Pour l'exemple, on suppose que le patient est connecté et a l'id 1
$patient_id = 1;

$action = $_GET['action'] ?? '';

// Gestion connexion
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'] ?? '';
    $patient = $controller->login($patient_id);
    if ($patient) {
        $_SESSION['patient_id'] = $patient['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = "ID patient invalide.";
        include __DIR__ . '/../app/Views/patient/login.php';
        exit;
    }
}
// Gestion inscription
if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $result = $controller->register($nom, $prenom, $email, $telephone);
    if (is_array($result) && isset($result['error'])) {
        $register_error = $result['error'];
        include __DIR__ . '/../app/Views/patient/login.php';
        exit;
    } else {
        $_SESSION['patient_id'] = $result;
        header('Location: index.php');
        exit;
    }
}
// Si pas connecté, afficher login
if (!isset($_SESSION['patient_id'])) {
    include __DIR__ . '/../app/Views/patient/login.php';
    exit;
}
$patient_id = $_SESSION['patient_id'];

if ($action === 'demander' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $specialite = $_POST['specialite'] ?? '';
    $date = $_POST['date'] ?? '';
    $heure = $_POST['heure'] ?? '';
    $datetime = $date;
    if ($heure) {
        $datetime .= ' ' . $heure;
    }
    $controller->demanderRV($patient_id, $specialite, $datetime);
    header('Location: index.php');
    exit;
}

if ($action === 'annuler' && isset($_GET['id'])) {
    $rv_id = intval($_GET['id']);
    $controller->annulerRV($rv_id, $patient_id);
    header('Location: index.php');
    exit;
}

if ($action === 'logout' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Affichage des vues
$rendezvous = $controller->mesRV($patient_id);
include __DIR__ . '/../app/Views/patient/demande_rv.php';
include __DIR__ . '/../app/Views/patient/rendezvous_list.php';
