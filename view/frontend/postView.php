<!DOCTYPE html>
<html>

<?php $title='Commentaires liés à l\'article';
          ob_start();  ?>

<body>
    <h1>Bienvenue sur le blog d'un apprenti</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['post'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le
            <?= $comment['datecom'] ?> (<a href="index.php?action=comment&idcom=<?= $comment['id_com'] ?>">modifier</a>)
        </p>
        <p>
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
        <?php
        }
        ?>
            <p/>

            <h2>Ecris un commentaire</h2>
            <form action="index.php?action=addComment&billet=<?= $_GET['billet'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" value="Envoyer" />
                </div>
            </form>

            <?php $content = ob_get_clean();
              require('template.php'); ?>
</body>

</html>
