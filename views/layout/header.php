<?php
require_once "../cli/functions.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../techsolution/views/layout/style.css">
    <title>TechSolution <?=$title?></title>
</head>
<body>
<header>
    <ul>
        <li><a href="../../../techsolution/accueil/index.php">Accueil</a></li>
        <li><a href="../../../techsolution/actualites/actualites.php">Actualités</a>
            <ul class="sous-menu">
                <li><a href="../../../techsolution/actualites/dev.php">Développement</a></li>
                <li><a href="../../../techsolution/actualites/design.php">Design</a></li>
                <li><a href="../../../techsolution/actualites/infra.php">Infrastructure</a></li>
            </ul>
        </li>
        <li><a href="../../../techsolution/contact/contact.php">Contact</a></li>
        <li>
            <?php
            if (is_connected()) {
                echo '<a href="../../../techsolution/admin/admin.php">Administrateur</a>';
            } else {
                echo '<a href="../../../techsolution/login/login.php">Connexion</a>';
            }
            ?>
        </li>

    </ul>
</header>
