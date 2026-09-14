<?php 

function inscription(PDO $pdo, $nom, $prenom, $email): void
{
    $requete = $pdo->prepare("INSERT INTO personne (email, nom, prenom) VALUES (:email, :nom, :prenom)");
    $requete->bindParam('email', $email);
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':prenom', $prenom);

    $requete->execute();
}

function utilisateurInfos($pdo, $nom, $prenom, $email): ?array
{
    $requete = $pdo->prepare("SELECT * FROM personne WHERE nom = :nom AND prenom = :prenom AND email = :email");
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':email', $email);
    $requete->execute();
    $user = $requete->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}
