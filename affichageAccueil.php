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
    while($billet = $affichage->fetch()){
    ?>
        <h3>
            <?php echo $billet['titre'].' publié le '. $billet['date_billet']; ?>
        </h3>
        <p>
            <?php echo htmlspecialchars($billet['article']); ?>
        </p> <br>
        <a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a>
        <?php
    }
    
    //Ne jamais oublier de fermer les ressources
    $affichage -> closeCursor();
    ?>
            <!-- Affiche le nombre de pages de commentaires à afficher (par convention, une page affiche 5 articles) -->
            <p>Page :
                <?php for($boucle = 0; $boucle<= $nbpages; $boucle++){
                        ?>
                <a href="index.php?page=<?php echo $boucle+1; ?>">
                    <?php echo $boucle+1; ?>
                </a>
                <?php
        }
        ?>
            </p>
</body>

</html>
