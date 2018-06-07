<!--
/* 
 *Amélioration de la lisibilité et de la clarté du code
 *Blog version 2.0
 *Auteur : JM. Hiltbrunner
*/ -->

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
    
    //Tentative de connextion à la BDD et affichage des 5 derniers articles du blog
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur rencontrée :'. $e.getMessage());   
    }
    if(isset($_GET['page'])){
        $affichage = $bdd->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($bdd->errorInfo()));
    }
    else{
        $affichage = $bdd->query('Select * from billets order by id asc limit 0,5');
    }
    while($billet = $affichage->fetch()){
    ?>    
    <h3><?php echo $billet['titre'].' publié le '. $billet['date_billet']; ?></h3>
    <p><?php echo htmlspecialchars($billet['article']); ?></p> <br>
    <a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a>
    <?php
    }
    
    //Ne jamais oublier de fermer les ressources
    $affichage -> closeCursor();
    ?>
     <!-- Affiche le nombre de pages de commentaires à afficher (par convention, une page affiche 5 articles) -->
    <?php
        $comptage = $bdd ->query('Select COUNT(*) as nb_billets from billets');
        $compte = $comptage->fetch();
        $nbpages = $compte['nb_billets']/5;
    ?>
    <p>Page : <?php 
        for($boucle = 0; $boucle<= $nbpages; $boucle++){
            ?>
            <a href="index.php?page=<?php echo $boucle+1; ?>"><?php echo $boucle+1; ?></a>
        <?php
        }
        ?></p>
</body>

</html>
