<!DOCTYPE html>

<html>
<!-- If any error is catch during process, display this error in an dedicated page -->
<?php $title='Erreur rencontrée';
      ob_start(); ?>
<body>   
<h1>Une erreur a été rencontrée lors de l'éxecution de la requête</h1>
    <p><?= $errorMessage ?></p>
    <a href="index.php">Retour à la page d'accueil</a>
    <?php $content = ob_get_clean();
          require'template.php'; ?>
</body>

</html>