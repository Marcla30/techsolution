<?php
$title = "- Ensemble des articles";
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
//    $sql = "SELECT * FROM articles";
    $sql = "SELECT * FROM articles ORDER BY idArticle DESC";


    // Execute the query
    $stmt = $conn->query($sql);

    // Fetch all results into an array
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Handle connection errors
    echo "Error: " . $e->getMessage();
}

if (isset($_GET['delete'])) {
    if (deleteArticle($_GET['delete'])) {
        header("Location: ../../techsolution/admin/admin.php");
        exit();
    }
}
if (isset($_GET['rmcontact'])) {
    if (removeContact($_GET['rmcontact'])) {
        header("Location: ../../techsolution/admin/admin.php");
        exit();
    }
}

?>
<h1>Pannel administratif</h1>
<div class="article">
    <h5>Connecté en tant que: <?=$nom?></h5>
<!--    <h5>Dernière connexion le: $date</h5>-->
    <div class="buttoncontainer">
        <button onclick="window.location.href='../../techsolution/admin/admin.php'">Retour à l'administration</button>
        <button class="alert" onclick="window.location.href='../../techsolution/login/login.php?stop=1'">Déconnexion</button>
        <!--<a href="../../techsolution/login/login.php?stop=1"">-->
        <!--    <button>Déconnexion</button>-->
        <!--</a>-->
    </div>
</div>
<h1>Article récent</h1>

<button onclick="window.location.href='../../techsolution/adminArticle/editarticle.php?edit='">Nouvel article</button>

<div class="article">
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
    </tr>
    </thead>
    <tbody>

    <?php
$articles = getAllArticle();
foreach ($articles as $article) {
    $editarticle = "../../techsolution/adminArticle/editarticle.php?edit=" . $article["idArticle"];
    $showarticle = "../../techsolution/actualites/article.php?id=" . $article["idArticle"];
    $removearticle = "../../techsolution/admin/admin.php?delete=" . $article["idArticle"];
    echo "<tr>";
    echo "<td>{$article['idArticle']}</td>";
    echo "<td>{$article['titreArticle']}</td>";
    echo "<td><a href=" . $article['contentArticle'] . ">" . substr($article['contentArticle'], 0, 50) . "</a></td>";
    echo "<td><a href=" . $editarticle . " </a>Modifier</td>";
    echo "<td><a href=" . $showarticle . " </a>Afficher</td>";
    echo "<td><a href=" . $removearticle . " </a>Supprimer</td>";
    echo "</tr>";

}

?>

    </tbody>
</table>

</div>






</body>
</html>