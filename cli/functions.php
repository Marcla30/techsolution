<?php

session_start();
if (isset($_SESSION['username'])) {
    $nom = $_SESSION['username'];
}

define('PATH', dirname(__DIR__));
const ADMINPATH = PATH . DIRECTORY_SEPARATOR . 'admin';
const ACTUPATH =  PATH . DIRECTORY_SEPARATOR . 'actualites';
const CONTACTPATH =  PATH . DIRECTORY_SEPARATOR . 'contact';

const HEADERPATH = PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . 'header.php';



//function conn() {
//    $host = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "techsolution";
//    if (defined("conn")) {
//        return conn;
//    } else {
//        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
//        define ("conn", $conn);
//    }
//    return $conn;
//
//}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "techsolution";

global $conn;
$conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);

function is_connected(): bool
{
    return isset($_SESSION['connexion']) && $_SESSION['connexion'] == 1;
}

function doUserExist($username, $password): bool {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";

// connect the database with the server
    try {
        // Connect to the database with PDO
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        // Set error mode to exceptions for easier debugging
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define the SQL query
        $sql = "SELECT * FROM utilisateurs";

        // Execute the query
        $stmt = $conn->query($sql);

        // Fetch all results into an array
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($row as $user) {
            if ($user["username"] == $username && $user["password"] == $password) {
                return true;
            }
        }

        return false;

    } catch (PDOException $e) {
        // Handle connection errors
        echo "Error: " . $e->getMessage();
    }
}

function updateUser($username, $oldPassword, $newPassword) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";
    global $conn;
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE utilisateurs SET password = :newpassword WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':newpassword', $newPassword);
    $stmt->bindParam(':username', $username);

    if (doUserExist($username, $oldPassword)) {
        $stmt->execute();
    } else {
        return false;
    }

    return true;
}

function updateArticle($id, $titre, $img, $tag, $content): bool {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";

    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE articles SET titreArticle = :titre, imgArticle = :img, tagArticle = :tag, contentArticle = :content WHERE idArticle = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function deleteArticle($id): bool {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";

    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM articles WHERE idArticle = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function createArticle($titre, $img, $tag, $content): bool {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";

    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `articles` (`idArticle`, `titreArticle`, `imgArticle`, `tagArticle`, `contentArticle`, `fkuserId`, `fkcodeTag`)
VALUES (NULL, :titre, :img, :tag, :content, :userid, :codetag)";

        $userid = 1;
        $codetag = 1;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':codetag', $codetag);

        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getTag() {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";
    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tags";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getArticle($id) {
    global $conn;

    $sql = "SELECT * FROM articles WHERE idArticle = :idArticle";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idArticle', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllArticle() {
    global $conn;

    $sql = "SELECT * FROM articles";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getXarticle($amount) {
    try {
        global $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM articles ORDER BY idArticle DESC LIMIT $amount";
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Handle connection errors
        echo "Error: " . $e->getMessage();
        return false;
    }

}

function pushContactForm($nom, $prenom, $email, $sujet) {
    try {
        global $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `formContact` (`idMessage`, `nomContact`, `prenomContact`, `emailContact`, `contentContact`)
VALUES (NULL, :nom, :prenom, :email, :sujet)";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sujet', $sujet);


        return $stmt->execute();

    } catch (PDOException $e) {
        // Handle connection errors
        echo "Error: " . $e->getMessage();
        return false;
    }

}

function getContact() {

    try {
        global $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM formContact ORDER BY idMessage DESC";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Handle connection errors
        echo "Error: " . $e->getMessage();
        return false;
    }

}

function removeContact($id) {

    try {
        global $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM formContact WHERE idMessage = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    } catch (PDOException $e) {
        // Handle connection errors
        echo "Error: " . $e->getMessage();
        return false;
    }

}

function getArticleByTag($tag) {
    global $conn;

    $sql = "SELECT * FROM articles WHERE tagArticle = :tag";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
