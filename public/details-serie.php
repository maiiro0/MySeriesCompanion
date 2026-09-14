<?php require_once __DIR__ . '/../inc/fonctions-series.php';
require_once __DIR__ . '/../inc/fonctions-saisons.php';
require_once __DIR__ . '/../inc/csrf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !csrfValide()) {
    http_response_code(403);
    die('Requête refusée : jeton CSRF manquant ou invalide.');
}

require_once __DIR__ . '/../inc/bdd.php';
require_once __DIR__ . '/../inc/entete.php';
$pdo = getConnection();

$id = $_GET['nom'] ?? null;
if ($id === null) {
    ?><p class="text-center text-red-500">Aucun identifiant de série fourni.</p><?php
    exit;
}

$serie = getSerieById($pdo, (int)$id);
if ($serie === null) {
    ?><p class="text-center text-red-500">Série non trouvée.</p><?php
    exit;
}

?> 

<ul class="list bg-base-100 rounded-box shadow-md w-3/6 mx-auto mt-10 mb-20">
    <li class="text-center">
        <div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $serie['nom'] ?></h2>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Résumé</div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $serie['resume'] ?></h2>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Vignette</div>
            <?php if (!empty($serie['vignette'])): ?>
                <img src="<?= htmlspecialchars($serie['vignette']) ?>" alt="Vignette de <?= htmlspecialchars($serie['nom']) ?>" class="mx-auto mb-5 rounded-box w-64 shadow-md">
            <?php else: ?>
                <p class="mb-5 opacity-60">Pas de vignette</p>
            <?php endif; ?>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Date de sortie</div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $serie['date_sortie'] ?></h2>
        </div>
    </li>
</ul>



<?php 
$saisons = getSaisonsBySerieId($pdo, (int)$id);
if (empty($saisons)) {
    ?><p class="text-center text-red-500">Aucune saison trouvée pour cette série.</p><?php
} else {?>
    <ul class="list bg-base-100 rounded-box shadow-md w-3/6 mx-auto mt-10">
        <?php foreach ($saisons as $saison): ?>
            <li class="list mb-10">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold"><?= $saison['nom'] ?></h2>
                    <a href="details-saison.php?nom=<?= $saison['id'] ?>" class="btn">Voir les détails</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}
?>






<button class="btn block w-3/6 mx-auto mb-30" onclick="my_modal_1.showModal()">Ajouter une saison</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h2 class="text-2xl font-bold mb-10 text-center mt-10" >Ajouter une saison</h2>
        <form method="POST" class="form-control mx-auto w-5/6 mt-10 mb-5">
            <label class="floating-label">
                <input type="text" name="nom" placeholder="Nom" class="input input-lg w-full" />
                <span>Nom (obligatoire)</span>
            </label>
            <textarea name="resume" class="textarea w-full" placeholder="Résumé"></textarea>
            <label class="floating-label">
                <input type="text" name="vignette" placeholder="Vignette" class="input input-lg w-full" />
                <span>Vignette</span>
            </label>
            <label class="floating-label">
                <input type="date" name="date_sortie" class="input input-lg w-full" />
                <span>Date de sortie (obligatoire)</span>
            </label>

            <button type="submit" class="btn mt-10 w-full">Valider</button>
        </form>


        <?php 
        $nom = $_POST['nom'] ?? '';
        $resume = $_POST['resume'] ?? '';
        $vignette = $_POST['vignette'] ?? '';
        $date_sortie = $_POST['date_sortie'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($nom) || empty($date_sortie)) {
                ?><p class="text-center text-red-500">Le nom et la date de sortie sont obligatoires.</p><?php
            }
            else {
                require_once __DIR__ . '/../inc/bdd.php';
                ajouterSaison($pdo, $serie['id'], $nom, $resume, $vignette, $date_sortie);
                ?><p class="text-center text-green-500 mb-20">Saison ajoutée avec succès.</p><?php
            }
        }
        ?>
    </div>
</dialog>



<?php require_once __DIR__ . '/../inc/pied.php'; ?> 