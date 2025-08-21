<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height:100vh;">
        <div class="card shadow-lg p-4" style="max-width:400px; width:100%;">
            <h2 class="text-center mb-4">Bienvenue à la Clinique</h2>
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-primary me-2" onclick="showLogin()">Connexion</button>
                <button class="btn btn-outline-primary" onclick="showRegister()">Inscription</button>
            </div>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger py-2"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
            <?php if (isset($register_error)): ?>
                <div class="alert alert-danger py-2"> <?= htmlspecialchars($register_error) ?> </div>
            <?php endif; ?>
            <div id="loginForm" style="display:none;">
                <h4 class="mb-3">Connexion</h4>
                <form method="POST" action="index.php?action=login">
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">ID Patient :</label>
                        <input type="text" name="patient_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Se connecter</button>
                </form>
            </div>
            <div id="registerForm" style="display:none;">
                <h4 class="mb-3">Inscription</h4>
                <form method="POST" action="index.php?action=register">
                    <div class="mb-2">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showLogin() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
        }
        function showRegister() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        }
        showLogin();
    </script>
</body>
</html>
