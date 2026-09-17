<?php require_once __DIR__ . '/../inc/fonctions-series.php';
require_once __DIR__ . '/../inc/fonctions-saisons.php';
require_once __DIR__ . '/../inc/fonctions-episodes.php';
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

$saison = getSaisonById($pdo, (int)$id);
if ($saison === null) {
    ?><p class="text-center text-red-500">Saison non trouvée.</p><?php
    exit;
}

?> 

<ul class="list bg-base-100 rounded-box shadow-md w-4/6 mx-auto mt-10 mb-20">
    <li class="text-center">
        <div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $saison['nom'] ?></h2>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Résumé</div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $saison['resume'] ?></h2>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Vignette</div>
            <?php if (!empty($saison['vignette'])): ?>
                <img src="<?= htmlspecialchars($saison['vignette']) ?>" class="mx-auto mb-5 rounded-box w-64 mx-auto shadow-md">
            <?php else: ?>
                <p class="mb-5 opacity-60">Pas de vignette</p>
            <?php endif; ?>
        </div>
    </li>
    <li class="list-row">
        <div>
            <div class="text-xs uppercase font-semibold opacity-60">Date de sortie</div>
            <h2 class="text-2xl font-bold mb-5 text-center w-full"><?= $saison['date_sortie'] ?></h2>
        </div>
    </li>
</ul>



<?php 
$episodes = getEpisodesBySaisonId($pdo, (int)$id);
if (empty($episodes)) {
    ?><p class="text-center text-red-500">Aucun épisode trouvé pour cette série.</p><?php
} else {?>
    <div class="grid grid-cols-3 gap-6 w-4/6 mx-auto mt-10 mb-20">
        <?php foreach ($episodes as $episode): ?>
            <div class="card bg-base-100 shadow-md">
                <figure>
                    <?php if (!empty($episode['vignette'])): ?>
                        <img src="<?= htmlspecialchars($episode['vignette']) ?>">
                    <?php else: ?>
                        <div class="h-40 bg-base-200 flex items-center justify-center opacity-60">Pas de vignette</div>
                    <?php endif; ?>
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?= $episode['nom'] ?></h2>
                    <h2 class="text-md font-bold w-full"><?= $episode['date_sortie'] ?></h2>
                    <p><?= $episode['resume'] ?></p>
                    <h2 class="text-md font-bold mb-5 w-full">Durée : <?= $episode['duree'] ?> minutes</h2>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}
?>






<button class="btn block mx-auto mb-30 w-4/6" onclick="my_modal_1.showModal()">Ajouter un épisode</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h2 class="text-2xl font-bold mb-10 text-center mt-10" >Ajouter une saison</h2>
        <form method="POST" class="form-control mx-auto w-4/6 mt-10 mb-5">
            <?= csrfChamp() ?>
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
            <label class="floating-label">
                <input type="text" name="duree" placeholder="Durée" class="input input-lg w-full" />
                <span>Durée (minutes)</span>
            </label>

            <button type="submit" class="btn mt-10 w-full">Valider</button>
        </form>


        <?php 
        $nom = $_POST['nom'] ?? '';
        $resume = $_POST['resume'] ?? '';
        $vignette = $_POST['vignette'] ?? '';
        $date_sortie = $_POST['date_sortie'] ?? '';
        $duree = $_POST['duree'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($nom) || empty($date_sortie)) {
                ?><p class="text-center text-red-500">Le nom et la date de sortie sont obligatoires.</p><?php
            }
            else {
                require_once __DIR__ . '/../inc/bdd.php';
                ajouterEpisode($pdo, $saison['id'], $nom, $resume, $vignette, $date_sortie, $duree === '' ? null : (int)$duree);
                ?><p class="text-center text-green-500 mb-20">Episode ajouté avec succès.</p><?php
            }
        }
        ?>
    </div>
</dialog>



<?php require_once __DIR__ . '/../inc/pied.php'; ?> 