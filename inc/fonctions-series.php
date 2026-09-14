<?php

function ajouterSerie(PDO $pdo, string $nom, string $resume, string $vignette, string $date_sortie): void
{
    $requete = $pdo->prepare("INSERT INTO serie (nom, resume, vignette, date_sortie) VALUES (:nom, :resume, :vignette, :date_sortie)");
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':resume', $resume);
    $requete->bindParam(':vignette', $vignette);
    $requete->bindParam(':date_sortie', $date_sortie);

    $requete->execute();
}

function getSeriesNomId(PDO $pdo): array
{
    $requete = $pdo->query("SELECT nom, id FROM serie");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}


function getSerieById(PDO $pdo, int $id): ?array
{
    $requete = $pdo->prepare("SELECT * FROM serie WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $serie = $requete->fetch(PDO::FETCH_ASSOC);
    return $serie ?: null;
}