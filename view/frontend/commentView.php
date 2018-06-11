<!DOCTYPE html>
<html>

<?php $title='Modification d\'un commentaire';
          ob_start();  ?>

<body>
    <h1>Bienvenue sur le blog d'un apprenti</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <p/>
    <h2>Voici le commentaire sélectionné</h2>
    <div class="news">
        <h3>
            <?php $commentaire = $comment->fetch();
             echo htmlspecialchars($commentaire['author']); ?>
        </h3>

        <p>
            <?= htmlspecialchars($commentaire['comment']) ?>
        </p>
    </div>

    <h2>Modifier un commentaire</h2>
    <p/>

    <form action="index.php?action=updateComment&idcom=<?= $_GET['idcom'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?= $commentaire['author'] ?>" disabled/>
        </div>
        <div>
            <label for="Ucomment">Commentaire</label><br />
            <textarea id="Ucomment" name="Ucomment"></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer" />
        </div>
    </form>

    <?php $comment -> closeCursor();
          $content = ob_get_clean();
          require('template.php'); ?>
</body>

</html>
