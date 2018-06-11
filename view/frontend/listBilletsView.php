<!-- Ici on ne s'occupe que de l'affichage des données -->
<!DOCTYPE html>

<html>
<!-- Le contenu de la balide head est factorisé dans le fichier template 
     Du coup on ne rappelle que le titre et on débute une mise en mémoire -->
<?php $title='Bienvenue sur un blog prototype !';
      ob_start(); ?>

<body>
    <h1>Bienvenue sur le blog d'un apprenti</h1>
    <h3>Les dernières nouvelles</h3>
    <?php
    while($article = $display->fetch()){
    ?>
        <h3>
            <?= $article['title'].' publié le '. $article['date_post'] ?>
        </h3>
        <p>
            <?= htmlspecialchars($article['post']) ?>
        </p> <br>
        <a href="index.php?action=post&billet=<?= $article['id'] ?>">Commentaires</a>
        <?php
    }
    
    //Ne jamais oublier de fermer les ressources
    $display -> closeCursor();
    ?>
            <!-- Affiche le nombre de pages de commentaires à afficher (par convention, une page affiche 5 articles) -->
            <p>Page :
                <?php for($looper = 0; $looper<= $nbPages; $looper++){
                        ?>
                <a href="index.php?action=listBillets&page=<?= $looper+1 ?>">
                    <?= $looper+1 ?>
                </a>
                <?php
        }
        ?>
            </p>
    <?php $content = ob_get_clean();
          require'template.php'; ?>
</body>

</html>
