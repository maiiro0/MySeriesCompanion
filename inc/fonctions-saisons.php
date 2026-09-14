<?php

function ajouterSaison(PDO $pdo, int $serie_id, string $nom, string $resume, string $vignette, string $date_sortie): void
{
    $requete = $pdo->prepare("INSERT INTO saison (serie_id, nom, resume, vignette, date_sortie) VALUES (:serie_id, :nom, :resume, :vignette, :date_sortie)");
    $requete->bindParam(':serie_id', $serie_id);
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':resume', $resume);
    $requete->bindParam(':vignette', $vignette);
    $requete->bindParam(':date_sortie', $date_sortie);

    $requete->execute();
}


function getSaisonsBySerieId(PDO $pdo, int $id): array
{
    $requete = $pdo->prepare("SELECT * FROM saison WHERE serie_id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}


function getSaisonById(PDO $pdo, int $saison_id): ?array
{
    $requete = $pdo->prepare("SELECT * FROM saison WHERE id = :saison_id");
    $requete->bindParam(':saison_id', $saison_id, PDO::PARAM_INT);
    $requete->execute();
    $saison = $requete->fetch(PDO::FETCH_ASSOC);
    return $saison ?: null;
}