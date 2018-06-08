<?php
//Ce fichier sert à faire l'affichage des billets et générer le nombre de pages
//Accès à la base de données et factorisation pour ne l'appeler qu'une seule fois dans tout le programme
function init(){
    $db = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
    return $db;
} 


//Récupère la liste des billets et les groupe par paquet de 5 pour un affichage paginé 
function getBillets(){
    $db = init();
    
    //Affichage des billets du blog par pagination (5 articles par page) ou si page n'apparait pas de la première page par defaut
    if(isset($_GET['page'])){
        $display = $db->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($db->errorInfo()));
    }
    else{
    $display = $db->query('Select * from billets order by id asc limit 0,5');
    }
    return $display;
}

//Récupère un billet pour lui afficher uniquement ses commentaires
function getBillet($id){
    $db = init();
    
    $request = $db -> prepare('SELECT * from billets where id = ?') or die(print_r($db->errorInfo()));
    $request -> execute(array($id));
    $billet = $request -> fetch();
    return $billet;
}

function getComments($id){
    $db = init();
    
    $comments = $db -> prepare('Select id, pseudo, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') as datecom from commentaires where id_article = ? order by datecom desc') or die(print_r($db->errorInfo()));
    $comments -> execute(array($id));
    return $comments;
}

//Displaying numbers of pages for displaying blog (Each page has 5 posts)
function getNbPages(){
    $db = init();
    
    $selectCount = $db ->query('Select COUNT(*) as nb_billets from billets') or die(print_r($db->errorInfo()));
    $count = $selectCount->fetch();
    return $count['nb_billets']/5;
}

function postComment($billet, $author, $comment){
    $db= init();
    
    $newComment = $db -> prepare('INSERT into commentaires(id_article, pseudo, commentaire, date_commentaire) values (?, ?, ?, now())') or die(print_r($db->errorInfo()));
    $addComment = $newComment -> execute(array($billet ,$author, $comment));
    return $addComment;
}
