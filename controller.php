<?php

require('modeleBillets.php');

//Controller displaying all posts group by 5-pack
function listBillets(){
    $display = getBillets();
    $nbPages = getNbPages();
    require('affichageAccueil.php');
}

//Controller that assumes displaying one post and its comments
function post(){
    $post = getBillet($_GET['id']);
    $comments = getComments($_GET['id']);
    require('postView.php');
}