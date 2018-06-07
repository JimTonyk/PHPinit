<!--
/* 
 *Amélioration de la lisibilité et de la clarté du code
 *Blog version 2.0
 *Auteur : JM. Hiltbrunner
*/ -->

<?php
//Récupération des données depuis la base de données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur rencontrée :'. $e.getMessage());   
}

//Affichage des billets du blog par pagination (5 articles par page)
if(isset($_GET['page'])){
    $affichage = $bdd->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($bdd->errorInfo()));
}
else{
    $affichage = $bdd->query('Select * from billets order by id asc limit 0,5');
}

//Détermination du nombre de pages
$comptage = $bdd ->query('Select COUNT(*) as nb_billets from billets');
$compte = $comptage->fetch();
$nbpages = $compte['nb_billets']/5;

require('affichageAccueil.php');
?>

  
