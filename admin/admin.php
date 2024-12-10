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
            <a class="hiddena" href="../../techsolution/admin/profil.php"><button>Profil</button></a>
            <a class="hiddena" href="../../techsolution/login/login.php?stop=1"">
                <button class="alert">Déconnexion</button>
            </a>
        </div>
</div>
<h1>Article récent</h1>

<a class="hiddena" href="../../techsolution/adminArticle/editarticle.php?edit="><button>Nouvel article</button></a>

<?php
// Boucle pour afficher les articles
foreach ($row as $article) {
    echo '<div class="article">';
    echo '<div class="img-container">';
    echo '<img src="' . $article['imgArticle'] . '" onerror="this.src=\'../../techsolution/img/main-illustration.jpg\'">';
    echo '</div>';
    echo '<h5><a href="../../techsolution/actualites/article.php?id=' . htmlspecialchars($article['idArticle']) . '">' . htmlspecialchars($article['titreArticle']) . '</a></h5>';
    echo '<h5><a>' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
    echo htmlspecialchars(substr($article['contentArticle'], 0, 200)).'...';
    echo '<div class="buttoncontainer">';
//    echo '<button onclick="window.location.href=\'../../techsolution/actualites/article.php?id=' .
//        htmlspecialchars($article['idArticle']) .
//        '\'">Afficher</button>';
    echo '<a class="hiddena" href="../../techsolution/actualites/article.php?id=' .
        htmlspecialchars($article['idArticle']) .
        '"><button>Afficher</button></a>';

    echo '<a class="hiddena" href="../../techsolution/adminArticle/editarticle.php?edit=' .
        htmlspecialchars($article['idArticle']) .
        '"><button>Modifier</button></a>';
    echo '<a class="hiddena" href="../../techsolution/admin/admin.php?delete=' .
        htmlspecialchars($article['idArticle']) .
        '"><button class="alert">Supprimer</button></a>';
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


<a href="../../techsolution/adminArticle/adminarticles.php"><button>Voir tout</button></a>
<h1>Derniers message reçu</h1>


<?php
$contacts = getContact();
foreach ($contacts as $contact) {
    $id = $contact['idContact'];
    echo '<div class="article">';
    echo '<h5>' . "Nom: " . htmlspecialchars($contact['nomContact']) . '</h5>';
    echo '<h5>' . "Prénom: " . htmlspecialchars($contact['prenomContact']) . '</h5>';
    echo '<h5>' . "Adresse mail: " . htmlspecialchars($contact['emailContact']) . '</h5>';
    echo '<h5>' . "Message: " . htmlspecialchars($contact['contentContact']) . '</h5>';
    echo '<div class="buttoncontainer">';
    echo '<button onclick="window.location.href=\'mailto:' . htmlspecialchars($contact['emailContact']) . '\'">Contacter</button>';
//    echo '<button class="alert" onclick="window.location.href=\'../../techsolution/admin/admin.php?rmcontact=' .
//        htmlspecialchars($contact['idMessage']) .
//        '\'">Supprimer</button>';
    echo '<form class="formbutton" method="GET">';
    echo '<input type="hidden" name="rmcontact" value="' . htmlspecialchars($contact['idMessage']) . '">';
    echo '<button class="alert" type="submit">Supprimer</button>';
    echo '</form>';

    echo '</div>';
    echo '</div>';
}
?>



<!--<div class="article">-->
<!--  <h6>Nom</h6>-->
<!--  <h6>Prénom</h6>-->
<!--  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,-->
<!--  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis-->
<!--  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.-->
<!---->
<!--  <div>-->
<!--    <input type="checkbox" id="message_lu" name="message_lu" checked />-->
<!--    <label for="message_lu">Marquer comme lu</label>-->
<!--  </div>-->
<!--  <button>Supprimer</button>-->
<!--</div>-->

</body>
</html>