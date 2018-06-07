<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Commentaires de l'article</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <h1>Bienvenue sur le blog d'un apprenti</h1>

    <?php while($billet = $affichage->fetch()){
        //Si le numéro de billet n'existe pas afficher une page d'erreur
        if(empty($billet)){
            echo 'Ce billet n\'existe pas <br>';
            echo '<a href="index.php">Retour à la page index</a>';
        }
        else{
    ?>
    <h3>
        <?php echo $billet['titre']; ?>
    </h3>
    <p>
        <?php echo htmlspecialchars($billet['article']); ?>
    </p> <br>
    <?php
        }
    }
    //Ne jamais oublier de fermer les ressources
    $affichage -> closeCursor();
    ?>
        <p/>
        <p/>
        <!-- Récupération de la liste des commentaires -->
        <h3>Liste des commentaires associés à cet article :</h3>
        <?php
    
    while($commentaire = $listeCommentaires -> fetch()){
    ?>
            <h4>
                <?php echo $commentaire['pseudo']. ' a écrit le '. $commentaire['date_commentaire']; ?>
            </h4>
            <p>
                <?php echo $commentaire['commentaire']; ?>
            </p>
            <?php
    }
    $listeCommentaires -> closeCursor();
    ?>
                <p/>
                <p/>
                <h4>Laisse un commentaire à cet article :</h4>
                <form method="post" action="commentaires_post.php?billet=<?php echo $numarticle; ?>">
                    <table>
                        <tr>
                            <td>Pseudonyme :</td>
                            <td><input type="text" name="pseudonyme" /></td>
                        </tr>
                        <tr>
                            <td>Commentaire :</td>
                            <td><input type="text" name="newcommentaire" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Soumettre" /></td>
                        </tr>
                    </table>
                </form>
</body>

</html>
