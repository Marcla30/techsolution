<?php
$title = "- Admin";
$p= dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'functions.php';
require_once $p;
include HEADERPATH;
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
//var_dump($_GET['edit']);
if (isset($_GET['edit']) && $_GET['edit'] != "")  {
    $id = intval($_GET['edit']);
    $article = getArticle($id);
    echo '<div class="formcontainer">';
    echo '<form action="editarticle.php" method="POST">';
    echo '<input type="hidden" name="editMode" value="1">';
    echo '<label for="titreArticle">Titre de l\'article :</label>';
    echo '<input type="text" id="titreArticle" name="titreArticle" placeholder="Titre de l\'article" value="' . htmlspecialchars($article['titreArticle']) . '" required>';
    echo '<label for="imgArticle">Image de l\'article :</label>';
    echo '<input type="text" id="imgArticle" name="imgArticle" placeholder="Image de l\'article" value="' . htmlspecialchars($article['imgArticle']) . '" required>';
    echo '<label for="tagArticle">Tag de l\'article :</label>';
    echo '<select name="tagArticle" id="tagArticle" required>';
    echo '<option value=""></option>';
    $tags = getTag();
    foreach ($tags as $tag) {
        $selected = ($article['tagArticle'] === $tag['libeleTag']) ? 'selected' : '';
        echo '<option value="' . htmlspecialchars($tag['libeleTag']) . '" ' . $selected . '>';
        echo htmlspecialchars($tag['libeleTag']);
        echo '</option>';
    }
    echo '</select>';
    echo '<label for="contentArticle">Contenu de l\'article :</label>';
    echo '<textarea id="contentArticle" name="contentArticle" rows="20" placeholder="Contenu de l\'article..." required>' . htmlspecialchars($article['contentArticle']) . '</textarea>';
    echo '<input type="hidden" name="idArticle" value="' . htmlspecialchars($article['idArticle']) . '">';
    echo '<input type="submit" value="Modifier l\'article">';
    echo '</form>';
    echo '</div>';

}else {
    echo '<div class="formcontainer">';
    echo '<form action="editarticle.php" method="POST">';
    echo '<label for="titreArticle">Titre de l\'article :</label>';
    echo '<input type="text" id="titreArticle" name="titreArticle" placeholder="Titre de l\'article" required>';
    echo '<label for="imgArticle">Image de l\'article :</label>';
    echo '<input type="text" id="imgArticle" name="imgArticle" placeholder="Image de l\'article" required>';
    echo '<label for="tagArticle">Tag de l\'article :</label>';
    echo '<option value=""></option>';
    echo '<select name="tagArticle" id="tagArticle">';
    $tags = getTag();
    foreach ($tags as $tag) {
        echo '<option value="' . htmlspecialchars($tag['libeleTag']) . '">';
        echo htmlspecialchars($tag['libeleTag']);
        echo '</option>';
    }
    echo '</select>';
//    echo '<input type="text" id="tagArticle" name="tagArticle" placeholder="Tag de l\'article" required>';
    echo '<label for="contentArticle">Contenu de l\'article :</label>';
    echo '<textarea id="contentArticle" name="contentArticle" rows="20" placeholder="Contenu de l\'article..." required></textarea>';
    echo '<input type="hidden" name="idArticle">';
    echo '<input type="submit" value="Créer l\'article">';
    echo '</form>';
    echo '</div>';
}

if (isset($_POST['editMode']) && $_POST['editMode'] == "1") {
//    var_dump($_POST);
    if (isset($_POST['idArticle'], $_POST['titreArticle'],$_POST['imgArticle'], $_POST['tagArticle'], $_POST['contentArticle'])) {
        $id = intval($_POST['idArticle']);
        $titre = $_POST['titreArticle'];
        $img = $_POST['imgArticle'];
        $tag = $_POST['tagArticle'];
        $content = $_POST['contentArticle'];

//        var_dump($content);
        if (updateArticle($id, $titre, $img, $tag, $content)) {
            header("Location: ../../techsolution/admin/admin.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'article.";
        }
    }
} else {
    if (isset($_POST['titreArticle'], $_POST['imgArticle'], $_POST['tagArticle'], $_POST['contentArticle'])) {
        $id = $_POST['titreArticle'];
        $titre = $_POST['imgArticle'];
        $tag = $_POST['tagArticle'];
        $content = $_POST['contentArticle'];

//        var_dump($content);
        // Appeler la fonction pour mettre à jour l'article
        if (createArticle($id, $titre, $tag, $content)) {
            header("Location: ../../techsolution/admin/admin.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'article.";
        }
    }
}

?>



</body>
</html>