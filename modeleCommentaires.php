<?php

function init(){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur rencontrée :'. $e.getMessage());   
    }
    return $bdd;
}

function getArticle(){
    $numarticle = (int)$_GET['billet']; 
    $bdd = init();
    
    $affichage = $bdd->prepare('Select titre,article from billets where id=?');
    $affichage->execute(array($numarticle));
    return $affichage;
}

function getCommnetaires(){
    $numarticle = (int)$_GET['billet']; 
    $bdd = init();
    
    $listeCommentaires = $bdd->prepare('Select pseudo, commentaire, date_commentaire from commentaires where id_article=? order by id desc');
    $listeCommentaires->execute(array($numarticle));
    return $listeCommentaires;
}


?>