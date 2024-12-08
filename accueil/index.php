<?php
$title = "";
include "../views/layout/header.php";
?>
<h1>TechSolution</h1>
<div class ="illustration">
    <img src="../img/main-illustration.jpg" alt="illustration techsolution">
</div>

<h1>Nos domaines d'expertises</h1>


<div class="services">
    <h3>Développement Logiciel</h3>
    <p>Nos experts conçoivent et maintiennent des logiciels sur mesure,
        alliant innovation et fiabilité pour répondre aux besoins
        spécifiques de chaque client.</p>
</div>
<div class="services">
    <h3>Design UX/UI</h3>
    <p>Nos designers créent des interfaces intuitives et esthétiques,
        garantissant une expérience utilisateur fluide et captivante
        pour vos applications et plateformes.</p>
</div>
<div class="services">
    <h3>Gestion des Infrastructures</h3>
    <p>Notre équipe assure la performance et la sécurité des systèmes
        informatiques, en déployant et en gérant réseaux, serveurs
        et infrastructures stratégiques.</p>
</div>

<h1>Nos derniers articles</h1>


<?php
if (getXarticle(3)) {
    $articles = getXarticle(3);
    foreach ($articles as $article) {
        echo '<div class="article">';
        echo '<div class="img-container">';
        echo '<img src="' . $article['imgArticle'] . '" onerror="this.src=\'../../techsolution/img/main-illustration.jpg\'">';
        echo '</div>';
        echo '<h5><a href="../../techsolution/actualites/article.php?id=' . htmlspecialchars($article['idArticle']) . '">' . htmlspecialchars($article['titreArticle']) . '</a></h5>';
        echo '<h5><a>' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
        echo htmlspecialchars(substr($article['contentArticle'], 0, 200)).'...';
        echo '</div>';
}

}
?>


<!--<div class="article">-->
<!--    <img src="../img/article.png" alt="template_article">-->
<!--    <h5><a href="tag1.html">Tag 1</a></h5>-->
<!--    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,-->
<!--    dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis-->
<!--    praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.-->
<!--</div>-->
<!--<div class="article">-->
<!--    <img src="../img/article.png" alt="template_article">-->
<!--    <h5><a href="#">Tag 2</a></h5>-->
<!--    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis,-->
<!--    dicta dolores doloribus ex explicabo necessitatibus obcaecati odio officiis-->
<!--    praesentium quia, rerum sit tenetur. Doloremque ea maiores numquam praesentium repellat.-->
<!--</div>-->


</body>
</html>