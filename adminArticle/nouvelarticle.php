<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvel article</title>
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

<h1>Nouvel article</h1>
<hr>

<div class="nouvelarticle">
  <form action="adminarticles.php">

    <label>Titre</label>
    <input type="text" id="title" placeholder="Titre de l'article..">

    <label>Contenu</label>
    <textarea id="contenu" name="contenu" placeholder="Contenu de l'article.."></textarea>

    <input type="submit" value="Submit">

  </form>

</div>

</body>
</html>