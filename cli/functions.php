<?php

session_start();
if (isset($_SESSION['username'])) {
    $nom = $_SESSION['username'];
}
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

function updateArticle($id, $titre, $tag, $content): bool {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techsolution";

    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE articles SET titreArticle = :titre, tagArticle = :tag, contentArticle = :content WHERE idArticle = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}



