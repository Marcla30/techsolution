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

?>
<h1>Pannel administratif</h1>
<div class="article">
    <h5>Connecté en tant que: <?=$nom?></h5>
    <h5>Dernière connexion le: $date</h5>
        <div class="buttoncontainer">
            <button>Profil</button>
            <button onclick="window.location.href='../../techsolution/login/login.php?stop=1'">Déconnexion</button>
            <!--<a href="../../techsolution/login/login.php?stop=1"">-->
            <!--    <button>Déconnexion</button>-->
            <!--</a>-->
        </div>
</div>
<h1>Article récent</h1>

<button onclick="window.location.href='../../techsolution/adminArticle/editarticle.php?edit='">Nouvel article</button>

<?php
// Boucle pour afficher les articles
foreach ($row as $article) {
    echo '<div class="article">';
    echo '<div class="img-container">';
    echo '<img src="' . $article['imgArticle'] . '"img/article.png" alt="template_article">';
    echo '</div>';
    echo '<h5><a>' . htmlspecialchars($article['titreArticle']) . '</a></h5>';
    echo '<h5><a href="tag1.html">' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
    echo htmlspecialchars(substr($article['contentArticle'], 0, 200)).'...';
    echo '<div class="buttoncontainer">';
    echo '<button>Afficher</button>';
    echo '<button onclick="window.location.href=\'../../techsolution/adminArticle/editarticle.php?edit=' .
        htmlspecialchars($article['idArticle']) .
        '\'">Modifier</button>';
    echo '<button onclick="window.location.href=\'../../techsolution/admin/admin.php?delete=' .
        htmlspecialchars($article['idArticle']) .
        '\'">Supprimer</button>';
    echo '</div>';
    echo '</div>';
}
?>

<!--<div class="article">-->
<!--  <img src="img/article.png" alt="template_article">-->
<!--  <h5><a href="#">Tag 2</a></h5>-->
<!--  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,-->
<!--  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis-->
<!--  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.-->
<!--    <div class="buttoncontainer">-->
<!--  <button>Afficher</button>-->
<!--  <button>Modifier</button>-->
<!--  <button>Supprimer</button>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="article">-->
<!--  <img src="img/article.png" alt="template_article">-->
<!--  <h5><a href="#">Tag 3</a></h5>-->
<!--  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,-->
<!--  dicta dolores doloribs ex explicabo necessitatibus obcaecati odio officiis-->
<!--  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.-->
<!--    <div class="buttoncontainer">-->
<!--        <button>Afficher</button>-->
<!--        <button>Modifier</button>-->
<!--        <button>Supprimer</button>-->
<!--    </div>-->
<!--</div>-->


<a href="adminArticle/adminarticles.php"><button>Voir tout</button></a>
<h2>Derniers message reçu</h2>
<hr>
<div class="messsage">
  <img src="img/article.png" alt="template_message">
  <h6>Nom</h6>
  <h6>Prénom</h6>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
  <hr>
  <div>
    <input type="checkbox" id="message_lu" name="message_lu" checked />
    <label for="message_lu">Marquer comme lu</label>
  </div>
  <button>Supprimer</button>
</div>

</body>
</html>