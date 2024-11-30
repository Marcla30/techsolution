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
<h1>Pannel administratif</h1>
<p>Connecté en tant que <?=$nom?></p>
<p>Dernière connexion le: $date</p>
<button>Profil</button>
<a href="../../techsolution/login/login.php?stop=1"">
    <button>Déconnexion</button>
</a>
<hr>
<h2>Article récent</h2>

<?php
// Boucle pour afficher les articles
foreach ($row as $article) {
    echo '<div class="article">';
    echo '<img src="img/article.png" alt="template_article">';
    echo '<h5><a>' . htmlspecialchars($article['titreArticle']) . '</a></h5>';
    echo '<h5><a href="tag1.html">' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
    echo htmlspecialchars(substr($article['contentArticle'], 0, 200)).'...';
    echo '<button>Afficher</button>';
    echo '<a class="hidden" href="../../techsolution/adminArticle/editarticle.php?edit=' .
        htmlspecialchars($article['idArticle']) .
        '"> <button>Modifier</button></a>';
    echo '<button>Supprimer</button>';
    echo '</div>';
}
?>

<div class="article">
  <img src="img/article.png" alt="template_article">
  <h5><a href="#">Tag 2</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
  <button>Modifier</button>
  <button>Supprimer</button>
</div>
<div class="article">
  <img src="img/article.png" alt="template_article">
  <h5><a href="#">Tag 3</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribs ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
  <button>Modifier</button>
  <button>Supprimer</button>
</div>
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