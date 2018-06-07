<?php
//Ce fichier sert à faire l'affichage des billets et générer le nombre de pages
//Accès à la base de données et factorisation pour ne l'appeler qu'une seule fois dans tout le programme
function init(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Error detected:'. $e.getMessage());   
    }
    return $db;
} 


//Récupère la liste des billets et les groupe par paquet de 5 pour un affichage paginé 
function getBillets(){
    $db = init();
    
    //Affichage des billets du blog par pagination (5 articles par page) ou si page n'apparait pas de la première page par defaut
    if(isset($_GET['page'])){
        $display = $db->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($bdd->errorInfo()));
    }
    else{
    $display = $db->query('Select * from billets order by id asc limit 0,5');
    }
    return $display;
}

//Récupère un billet pour lui afficher uniquement ses commentaires
function getBillet($id){
    $db = init();
    
    $request = $db -> prepare('SELECT * from billets where id = ?') or die(print_r($bdd->errorInfo()));
    $request -> execute(array($id));
    $billet = $request -> fetch();
    return $billet;
}

function getComments($id){
    $db = init();
    
    $comments = $db -> prepare('Select id, pseudo, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') as datecom from commentaires where id_article = ? order by datecom desc') or die(print_r($bdd->errorInfo()));
    $comments -> execute(array($id));
    return $comments;
}

function getNbPages(){
    $db = init();
    
    $selectCount = $db ->query('Select COUNT(*) as nb_billets from billets') or die(print_r($bdd->errorInfo()));
    $count = $selectCount->fetch();
    return $count['nb_billets']/5;
}
