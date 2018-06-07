<?php $numarticle = (int)$_GET['billet']; 
//Connexion à la BDD et affichage de l'article choisi pour les commentaires
try{
    $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur rencontrée :'. $e.getMessage());   
}

$affichage = $bdd->prepare('Select titre,article from billets where id=?');
$affichage->execute(array($numarticle));

//Affichage des commentaires lié à l'article
$listeCommentaires = $bdd->prepare('Select pseudo, commentaire, date_commentaire from commentaires where id_article=? order by id desc');
$listeCommentaires->execute(array($numarticle));

require('affichageCommentaires.php');
?>

