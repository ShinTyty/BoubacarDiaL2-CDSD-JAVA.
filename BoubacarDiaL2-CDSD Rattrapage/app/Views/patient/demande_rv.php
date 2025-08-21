<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3">
        <form method="post" action="?action=logout" style="text-align:right;">
                <button type="submit" class="btn btn-outline-secondary">Déconnexion</button>
        </form>
</div>
<div class="container mt-5">
        <h2 class="mb-4">Demander un rendez-vous</h2>
        <form method="post" action="?action=demander" class="row g-3">
                <div class="col-md-6">
                        <label class="form-label">Spécialité :</label>
                        <select name="specialite" class="form-select">
                                <option value="Généraliste">Généraliste</option>
                                <option value="Dentaire">Dentaire</option>
                                <option value="Cardiologue">Cardiologue</option>
                        </select>
                </div>
                        <div class="col-md-3">
                                <label class="form-label">Date :</label>
                                <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                                <label class="form-label">Heure :</label>
                                <input type="time" name="heure" class="form-control" required>
                        </div>
                <div class="col-12">
                        <button type="submit" class="btn btn-primary">Demander</button>
                </div>
        </form>
    </div>
