<?php
$title = "- Connexion";
include "../views/layout/header.php";
require_once "../cli/functions.php";

$nom = $_POST['username'];
$mdp = $_POST['password'];


if (isset($_GET['stop'])) {
    unset($_SESSION['connexion']);
} elseif (is_connected()) {
    header('Location: ../../techsolution/admin/admin.php');
} else {
    $bd = [
        'username' => 'admin',
        'password' => 'pwd',
    ];

    if (! empty($nom) && ! empty($mdp)) {
//        if ($nom === $bd['username'] && $mdp === $bd['password']) {
        if (doUserExist($nom, $mdp)) {
            $_SESSION['connexion'] = 1;
            $_SESSION['username'] = $nom;
            header('Location: ../../techsolution/admin/admin.php');
            exit();
        } else {
            $message = "Erreur d'authentification";
        }
    }
}


?>
<head>
    <link rel="stylesheet" href="login.css">
</head>
<h1>Connexion</h1>

<div class="formcontainer">
    <form action="login.php" method="post">
        <input type="username" name="username" placeholder="Adresse mail"><br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <input type="submit" value="Se connecter"><br>
        <?="<a>".$message."</a>"?>
    </form>
</div>
</body>
</html>