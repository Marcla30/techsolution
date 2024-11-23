<?php
$title = "- Admin";
include "../views/layout/header.php";
?>
<h1>Pannel administratif</h1>
<hr>
<p>Connecté en tant que $username</p>
<p>Dernière connexion le: $date</p>
<button>Profil</button>
<button>Déconnexion</button>
<hr>
<h2>Article récent</h2>
<hr>
<div class="article">
  <img src="img/article.png" alt="template_article">
  <h5><a href="tag1.html">Tag 1</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
  <button>Modifier</button>
  <button>Supprimer</button>
</div>
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