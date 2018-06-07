<!-- Ici on ne s'occupe que de l'affichage des données -->
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Bienvenue sur un blog prototype</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <h1>Bienvenue sur le blog d'un apprenti</h1>
    <h3>Les dernières nouvelles</h3>
    <?php
    while($article = $display->fetch()){
    ?>
        <h3>
            <?= $article['titre'].' publié le '. $article['date_billet'] ?>
        </h3>
        <p>
            <?= htmlspecialchars($article['article']) ?>
        </p> <br>
        <a href="commentaires.php?billet=<?= $article['id'] ?>">Commentaires</a>
        <?php
    }
    
    //Ne jamais oublier de fermer les ressources
    $display -> closeCursor();
    ?>
            <!-- Affiche le nombre de pages de commentaires à afficher (par convention, une page affiche 5 articles) -->
            <p>Page :
                <?php for($looper = 0; $looper<= $nbPages; $looper++){
                        ?>
                <a href="index.php?page=<?= $looper+1 ?>">
                    <?= $looper+1 ?>
                </a>
                <?php
        }
        ?>
            </p>
</body>

</html>
