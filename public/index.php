<?php require_once __DIR__ . '/../inc/fonctions-series.php'; 
require_once __DIR__ . '/../inc/bdd.php';
require_once __DIR__ . '/../inc/entete.php';
require_once __DIR__ . '/../inc/fonctions-utilisateur.php';
$pdo = getConnection();?> 

<h2 class="text-2xl font-bold text-center mt-20">Se connecter</h2>
<form method="POST" class="form-control mx-auto w-3/6 mt-10 mb-20">
    <label class="floating-label mb-3">
        <input type="text" name="nom" placeholder="Nom" class="input input-lg w-full" />
        <span>Nom (obligatoire)</span>
    </label>
    <label class="floating-label mb-3">
        <input type="text" name="prenom" placeholder="Prénom" class="input input-lg w-full" />
        <span>Prénom (obligatoire)</span>
    </label>
    <label class="floating-label mb-3">
        <input type="text" name="email" placeholder="Email" class="input input-lg w-full" />
        <span>Email (obligatoire)</span>
    </label>

    <button type="submit" class="btn mt-10 w-full">Valider</button>
</form>





<button class="btn block w-3/6 mx-auto mb-5" onclick="my_modal_1.showModal()">S'inscrire</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h2 class="text-2xl font-bold mb-10 text-center">S'inscrire</h2>
        <form method="POST" class="form-control mx-auto w-3/6">
            <label class="floating-label mb-3">
                <input type="text" name="nom" placeholder="Nom" class="input input-lg w-full" />
                <span>Nom (obligatoire)</span>
            </label>
            <label class="floating-label mb-3">
                <input type="text" name="prenom" placeholder="Prénom" class="input input-lg w-full" />
                <span>Prénom (obligatoire)</span>
            </label>
            <label class="floating-label">
                <input type="text" name="email" placeholder="Email" class="input input-lg w-full" />
                <span>Email (obligatoire)</span>
            </label>

            <button type="submit" class="btn mt-10 w-full">Valider</button>
        </form>


        <?php 
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($nom) || empty($prenom) || empty($email)) {
                ?><p class="text-center text-red-500">Le nom, le prenom et le mail sont obligatoires.</p><?php
            }
            else {
                require_once __DIR__ . '/../inc/bdd.php';
                inscription($pdo, $nom, $prenom, $email);
                ?><p class="text-center text-green-500 mb-20">Inscription réussie</p><?php
            }
        }
        ?>
    </div>
</dialog>






<?php 
$nom = $_POST['nom'] ?? '';
$resume = $_POST['prenom'] ?? '';
$vignette = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nom) || empty($prenom) || empty($email)) {
        ?><p class="text-center text-red-500">Le nom, le prenom et le mail sont obligatoires.</p><?php
    }
    else {
        require_once __DIR__ . '/../inc/bdd.php';
        $infosUtilisateur = utilisateurInfos($pdo, $nom, $prenom, $email);
        ?><p><?php $infosUtilisateur ?></p><?php
        if ($infosUtilisateur == null){
            ?><p class="text-center text-red-500">Donnée incorecte</p><?php
        }
        else {
            header('Location: liste-series.php');
        }
    }
}
?>

<?php require_once __DIR__ . '/../inc/pied.php'; ?> 