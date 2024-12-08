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
    echo '<img src="' . $article['imgArticle'] . '" onerror="this.src=\'../../techsolution/img/main-illustration.jpg\'">';
    echo '</div>';
    echo '<h5><a>' . htmlspecialchars($article['tagArticle']) . '</a></h5>';
    echo htmlspecialchars($article['contentArticle']);

}
?>


</body>
</html>