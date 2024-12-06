<?php
$title = "- Actualités";
include "../views/layout/header.php";
?>
<body>



<?php

$id = $_GET['id'];

if (getarticle($id)) {
    $article = getarticle($id);
    echo '<h1><a>' . htmlspecialchars($article['titreArticle']) . '</a></h1>';
    echo '<div class="article">';
    echo '<div class="img-container">';
    echo '<img src="' . $article['imgArticle'] . '"img/article.png" alt="template_article">';
    echo '</div>';
    echo '<h5><a href="tag1.html">' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
    echo htmlspecialchars($article['contentArticle']);

}
?>


</body>
</html>