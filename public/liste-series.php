<?php require_once __DIR__ . '/../inc/fonctions-series.php'; 
require_once __DIR__ . '/../inc/bdd.php';
require_once __DIR__ . '/../inc/entete.php';
$pdo = getConnection();?> 

<ul class="list bg-base-100 rounded-box shadow-md w-3/6 mx-auto mt-10 mb-20">
    <li class="list-row">
        <div>
            <h2 class="text-2xl font-bold mb-10 text-center mt-20 w-full" >Les séries disponibles</h2>
        </div>
    </li>
    <?php
    $series = getSeriesNomId($pdo);
    foreach ($series as $serie) {
        ?>
        <li class="list-row w-full flex justify-between items-center">
            <div class="flex justify-between items-center w-full">
                <div><?= htmlspecialchars($serie['nom']) ?></div>
                <a href="details-serie.php?nom=<?= $serie['id'] ?>" class="btn btn-primary">Voir les détails</a>
            </div>
        </li>
        <?php
    }
    ?>
</ul>


<?php require_once __DIR__ . '/../inc/pied.php'; ?> 