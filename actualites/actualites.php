<?php
$title = "- Actualités";
include "../views/layout/header.php";
?>
<body>


<h1>Derniers articles</h1>

<?php
if (getXarticle(10)) {
    $articles = getXarticle(10);
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


</body>
</html>