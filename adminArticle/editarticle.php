<?php
$title = "- Admin";
include "../views/layout/header.php";
require_once "../cli/functions.php";
if (!is_connected()) {
    header("Location: ../../techsolution/login/login.php");
    exit();
}


$host = "localhost";
$username = "root";
$password = "";
$dbname = "techsolution";

// connect the database with the server
//$conn = new mysqli($host,$username,$password,$dbname);
try {
    // Connect to the database with PDO
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
    // Set error mode to exceptions for easier debugging
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the SQL query
    $sql = "SELECT * FROM articles";

    // Execute the query
    $stmt = $conn->query($sql);

    // Fetch all results into an array
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Handle connection errors
    echo "Error: " . $e->getMessage();
}




?>
<head>
    <link rel="stylesheet" href="../../techsolution/login/login.css">
</head>



<h1>Edition article</h1>


<?php
if (isset($_GET['edit'])) {
    $article = $row[$_GET['edit']-1];
    echo '<div class="formcontainer">';
    echo '<form action="editarticle.php" method="POST">';
    echo '<label for="titreArticle">Titre de l\'article :</label>';
    echo '<input type="text" id="titreArticle" name="titreArticle" placeholder="Titre de l\'article" value="' . htmlspecialchars($article['titreArticle']) . '" required>';
    echo '<label for="tagArticle">Tag de l\'article :</label>';
    echo '<input type="text" id="tagArticle" name="tagArticle" placeholder="Tag de l\'article" value="' . htmlspecialchars($article['tagArticle']) . '" required>';
    echo '<label for="contentArticle">Contenu de l\'article :</label>';
    echo '<textarea id="contentArticle" name="contentArticle" rows="20" placeholder="Contenu de l\'article..." required>' . htmlspecialchars($article['contentArticle']) . '</textarea>';
    echo '<input type="hidden" name="article_id" value="' . htmlspecialchars($article['idArticle']) . '">';
    echo '<input type="submit" value="Modifier l\'article">';
    echo '</form>';
    echo '</div>';

}

if (isset($_POST['article_id'], $_POST['titreArticle'], $_POST['tagArticle'], $_POST['contentArticle'])) {
    // Récupérer les données du formulaire
    $id = intval($_POST['article_id']);
    $titre = htmlspecialchars($_POST['titreArticle']);
    $tag = htmlspecialchars($_POST['tagArticle']);
    $content = htmlspecialchars($_POST['contentArticle']);

    // Appeler la fonction pour mettre à jour l'article
    if (updateArticle($id, $titre, $tag, $content)) {
        header("Location: ../../techsolution/admin/admin.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
}

?>



</body>
</html>