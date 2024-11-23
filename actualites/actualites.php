<?php
$title = "- Actualités";
include "../views/layout/header.php";
?>
<body>
<?php
$menu=[
        [
            'url'=> "accueil/index.php",
            'nom' => "Accueil"
        ],
        [
            'url'=> "actualites.html",
            'nom' => "Actualités"
        ],
    ]
?>

<h1>Derniers articles</h1>
<div class="article">
  <img src="../img/article.png" alt="template_article">
  <h5><a href="tag1.html">Tag 1</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
</div>
<div class="article">
  <img src="../img/article.png" alt="template_article">
  <h5><a href="#">Tag 2</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
</div>
<div class="article">
  <img src="../img/article.png" alt="template_article">
  <h5><a href="#">Tag 3</a></h5>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,
  dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis
  praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.
</div>

</body>
</html>