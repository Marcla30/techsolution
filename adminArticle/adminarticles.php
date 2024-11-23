<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration articles</title>
</head>
<body>
<header>
    <ul>
        <li><a href="../accueil/index.php">Accueil</a></li>
        <li><a href="../actualites/actualites.php">Actualités</a>
            <ul class="sous-menu">
                <li><a href="tag1.html">Tag 1</a></li>
                <li><a href="#">Tag 2</a></li>
                <li><a href="#">Tag 3</a></li>
            </ul>
        </li>
        <li><a href="../contact/contact.php">Contact</a></li>
        <li><a href="../login/login.php">Connexion</a></li>
    </ul>
</header>
<h1>Administration articles</h1>
<hr>
<a href="nouvelarticle.php"><button>Nouveau</button></a>
<table>
    <tr>
        <th>id</th>
        <th>Titre</th>
        <th>Contenu</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Titre article 1</td>
        <td>Lorem ipsum dolor sit amet, consectetur...</td>
        <td>
            <a href="nouvelarticle.php"><button>Modifier</button></a>
            <a href="editionarticle.html"><button>Supprimer</button></a>
        </td>

    </tr>
    <tr>
        <td>2</td>
        <td>Titre article 2</td>
        <td>Lorem ipsum dolor sit amet, consectetur...</td>
        <td>
            <a href="nouvelarticle.php"><button>Modifier</button></a>
            <a href="editionarticle.html"><button>Supprimer</button></a>
        </td>

    </tr>
    <tr>
        <td>3</td>
        <td>Titre article 3</td>
        <td>Lorem ipsum dolor sit amet, consectetur...</td>
        <td>
            <a href="nouvelarticle.php"><button>Modifier</button></a>
            <a href="editionarticle.html"><button>Supprimer</button></a>
        </td>

    </tr>
</table>
</body>
</html>