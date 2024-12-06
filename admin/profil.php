<?php
$title = "- Profil";
include "../views/layout/header.php";
require_once "../cli/functions.php";

if (!is_connected()) {
    header("Location: ../../techsolution/login/login.php");
    exit();
}

?>
<head>
    <link rel="stylesheet" href="../../techsolution/login/login.css">
</head>
<h1>Profil</h1>
<div class="article">
    <h5>Connecté en tant que: <?=$nom?></h5>
    <div class="buttoncontainer">
        <button onclick="window.location.href='../../techsolution/admin/admin.php'">Retour à l'administration</button>
        <button class="alert" onclick="window.location.href='../../techsolution/login/login.php?stop=1'">Déconnexion</button>
        <!--<a href="../../techsolution/login/login.php?stop=1"">-->
        <!--    <button>Déconnexion</button>-->
        <!--</a>-->
    </div>
</div>

<?php

if (isset($_POST['username']) && isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpasswordconfirm'])) {
    $nom = htmlspecialchars($_POST['username']);
    $oldpassword = htmlspecialchars($_POST['oldpassword']);
    $newpassword = htmlspecialchars($_POST['newpassword']);
    if ($_POST['newpassword'] == $_POST['newpasswordconfirm']) {
        updateUser($nom, $oldpassword, $newpassword);
        $message = "Le mot de passe a bien été changé.";
    } else {
        $message = "Erreur.";
    }

}

echo '<div class="formcontainer">';
echo '<form action="profil.php" method="POST">';
echo '<label for="username">Nom d\'utilisateur :</label>';
echo '<input type="text" id="username" name="username" placeholder="Nom d\'utilisateur" value="' . $nom . '" required>';
echo '<label for="oldpassword">Mot de passe actuel :</label>';
echo '<input type="password" id="oldpassword" name="oldpassword" placeholder="Mot de passe actuel" required>';
echo '<label for="newpassword">Nouveau mot de passe :</label>';
echo '<input type="password" id="newpassword" name="newpassword" placeholder="Nouveau mot de passe" required>';
echo '<label for="newpasswordconfirm">Confirmation du mot de passe :</label>';
echo '<input type="password" id="newpasswordconfirm" name="newpasswordconfirm" placeholder="Confirmation du mot de passe" required>';
echo '<input type="submit" value="Modifier le mot de passe">';
echo '<br>';
echo "<a>". $message."</a>";
echo '</form>';
echo '</div>';




?>

</body>
</html>