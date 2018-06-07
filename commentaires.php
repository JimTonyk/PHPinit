<?php 

require('modeleCommentaires.php');

$affichage = getArticle();
$listeCommentaires = getCommnetaires();

require('affichageCommentaires.php');

?>

