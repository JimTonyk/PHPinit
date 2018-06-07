<?php

$numarticle=(int)$_GET['billet'];
//Récupère les valeurs des champs saisis dans le formulaire
if(isset($_POST['pseudonyme'])){
    $pseudo = htmlspecialchars($_POST['pseudonyme']);
    //echo 'pseudo :'.$pseudo;
}
if(isset($_POST['newcommentaire'])){
    $message = htmlspecialchars($_POST['newcommentaire']);
    //echo 'commentaire: '.$message;
}


//Insére le contenu des champs dans la base de données
if($pseudo !='' AND $message!=''){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
      $requete = $bdd -> prepare('INSERT into commentaires(id_article, pseudo, commentaire, date_commentaire) VALUES (:idarticle,:pseudo,:message,now())');
      $requete -> execute(array (
          'idarticle' => $numarticle,
          'pseudo'=> $pseudo,
          'message' => $message
      ));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}


//Redirige l'utilisateur vers l'accueil du blog'
header('Location: index.php');
?>
