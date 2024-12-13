<?php
$title = "- Profil";
$p= dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'functions.php';
require_once $p;
include HEADERPATH;

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
        <a class="hiddena" href="../../techsolution/admin/admin.php"><button>Retour à l'administration</button></a>
        <a class="hiddena" href="../../techsolution/login/login.php?stop=1"><button class="alert">Déconnexion</button></a>
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
echo "<h5>Si vous souhaitez supprimer votre compte, merci nous adresser votre demande par mail à contact@techsolutions.fr</h5>";
echo '</form>';
echo '</div>';





?>

</body>
</html>