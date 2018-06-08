<?php

require('model\modeleBillets.php');

//Controller displaying all posts group by 5-pack
function listBillets(){
    $display = getBillets();
    $nbPages = getNbPages();
    
    require('view\frontend\affichageAccueil.php');
}

//Controller that assumes displaying one post and its comments
function post(){
    $post = getBillet($_GET['billet']);
    $comments = getComments($_GET['billet']);
    
    require('view\frontend\postView.php');
}
