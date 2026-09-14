<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css?v=<?= filemtime(__DIR__ . '/../public/css/output.css') ?>">
    <title>My Serie Companion</title>
</head>
<body>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">My Series Companion</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
            <li><a href="index.php">Ajout</a></li>
            <li><a href="liste-series.php">Séries</a></li>
            </ul>
        </div>
    </div>