<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2 class="mb-4">Mes rendez-vous</h2>
    <ul class="list-group">
        <?php foreach ($rendezvous as $rv): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <strong>Spécialité:</strong> <?= htmlspecialchars($rv['specialite']) ?> |
                    <strong>Date:</strong> <?= date('d/m/Y H:i', strtotime($rv['date'])) ?> |
                    <strong>Statut:</strong> <?= htmlspecialchars($rv['statut']) ?>
                    <?php if ($rv['statut'] == 'demande_annulation'): ?>
                        <span class="badge bg-warning text-dark ms-2">Demande d'annulation émise</span>
                    <?php endif; ?>
                </span>
                <?php if ($rv['statut'] == 'en attente'): ?>
                    <form method="post" action="?action=annuler&id=<?= $rv['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Demander annulation</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
