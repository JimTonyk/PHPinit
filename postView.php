<!DOCTYPE html>
<html>
    
    <?php $title='Commentaires liés à l\'article';
          ob_start();  ?>

    <body>
        <h1>Bienvenue sur le blog d'un apprenti</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
        <div class="news">
            <h3>
                <?= htmlspecialchars($post['titre']) ?>
            </h3>        

            <p>
                <?= nl2br(htmlspecialchars($post['article'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['datecom'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['commentaire'])) ?></p>
        <?php
        }
        ?>
        
        <?php $content = ob_get_clean();
              require('template.php'); ?> 
    </body>
</html>