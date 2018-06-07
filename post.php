<?php

require('modeleBillets.php');

if(isset($_GET['billet']) AND $_GET['billet']>0){
    $post = getBillet($_GET['billet']);
    $comments = getComments($_GET['billet']);
}
else{
    echo 'Erreur: ce billet n\'existe pas';
}

require ('postView.php');
