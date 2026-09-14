<?php

function getEpisodesBySaisonId(PDO $pdo, int $saison_id): array
{
    $requete = $pdo->prepare("SELECT * FROM episode WHERE saison_id = :saison_id");
    $requete->bindParam(':saison_id', $saison_id, PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}


function ajouterEpisode(PDO $pdo, int $saison_id, string $nom, string $resume, string $vignette, string $date_sortie, ?int $duree = null): void
{
    $requete = $pdo->prepare("INSERT INTO episode (saison_id, nom, resume, vignette, date_sortie, duree) VALUES (:saison_id, :nom, :resume, :vignette, :date_sortie, :duree)");
    $requete->bindParam(':saison_id', $saison_id, PDO::PARAM_INT);
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':resume', $resume);
    $requete->bindParam(':vignette', $vignette);
    $requete->bindParam(':date_sortie', $date_sortie);
    $requete->bindParam(':duree', $duree, PDO::PARAM_INT);

    $requete->execute();
}