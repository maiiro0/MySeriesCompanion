<?php require_once __DIR__ . '/../inc/fonctions-series.php';
require_once __DIR__ . '/../inc/csrf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !csrfValide()) {
    http_response_code(403);
    die('Requête refusée : jeton CSRF manquant ou invalide.');
}

require_once __DIR__ . '/../inc/bdd.php';
require_once __DIR__ . '/../inc/entete.php';
$pdo = getConnection();?>

<h2 class="text-2xl font-bold mb-10 text-center mt-20" >Ajouter une série</h2>
<form method="POST" class="form-control mx-auto w-3/6 mt-10 mb-20">
    <?= csrfChamp() ?>
    <label class="floating-label pb-3">
        <input type="text" name="nom" placeholder="Nom" class="input input-lg w-full" />
        <span>Nom (obligatoire)</span>
    </label>
    <textarea name="resume" class="textarea w-full" placeholder="Résumé"></textarea>
    <label class="floating-label pb-3 pt-3">
        <input type="text" name="vignette" placeholder="Vignette" class="input input-lg w-full" />
        <span>Vignette</span>
    </label>
    <label class="floating-label pb-3">
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
        ajouterSerie($pdo, $nom, $resume, $vignette, $date_sortie);
        ?><p class="text-center text-green-500">Série ajoutée avec succès.</p><?php
    }
}
?>

<?php require_once __DIR__ . '/../inc/pied.php'; ?> 