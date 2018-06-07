<?php
//Ce fichier sert à faire l'affichage des billets et générer le nombre de pages
//Accès à la base de données et factoriqation pour ne l'appeler qu'une seule fois dans tout le programme
function init(){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur rencontrée :'. $e.getMessage());   
    }
    return $bdd;
} 


function getBillets(){

    $bdd = init();
    //Affichage des billets du blog par pagination (5 articles par page)
    if(isset($_GET['page'])){
        $affichage = $bdd->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($bdd->errorInfo()));
    }
    else{
    $affichage = $bdd->query('Select * from billets order by id asc limit 0,5');
    }
    return $affichage;
}

function getNbPages(){
    $bdd=init();
    $comptage = $bdd ->query('Select COUNT(*) as nb_billets from billets') or die(print_r($bdd->errorInfo()));
    $compte = $comptage->fetch();
    return $compte['nb_billets']/5;
}

?>
