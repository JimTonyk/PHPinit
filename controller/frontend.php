<?php

require_once('model\PostManager.php');
require_once('model\CommentManager.php');

//Controller displaying all posts group by 5-pack
function listBillets() {
    $postManager = new \org\formation\php\model\PostManager();
    
    $display = $postManager -> getBillets();
    $nbPages = $postManager -> getNbPages();
    
    require('view\frontend\listBilletsView.php');
}

function getComment($id){
    $postManager = new \org\formation\php\model\PostManager();
    $commentManager = new \org\formation\php\model\CommentManager();
    
    $comment = $commentManager -> getComment($_GET['idcom']);
    
    require('view\frontend\commentView.php');
}

//Controller that assumes displaying one post and its comments
function post() {
    $postManager = new \org\formation\php\model\PostManager();
    $commentManager = new \org\formation\php\model\CommentManager();
    
    $post = $postManager -> getBillet($_GET['billet']);
    $comments = $commentManager -> getComments($_GET['billet']);
    
    require('view\frontend\postView.php');
}

//Controller able to post comments on each post
function addComment($billet ,$author, $comment) {
    $commentManager = new \org\formation\php\model\CommentManager();
    
    $postComment = $commentManager -> postComment($billet, $author, $comment);
    
    if($postComment === false) {
        throw new Exception('Le commentaire n\'a pas été ajouté. Essayez plus tard.');
    }
    else {
        header('Location: index.php?action=post&billet='.$billet);
    }
}

function updateComment($comment, $id){
    $commentManager = new \org\formation\php\model\CommentManager();
    //$actualComment = $commentManager -> getComment($_GET['idcom']);
    
    $updateComment = $commentManager -> updateComment($comment, $_GET['idcom']);
    if($updateComment === false) {
        throw new Exception('Le commentaire n\'a pas été modifié. Essayez plus tard.');
    }
    else {
        header('Location: index.php?action=comment&idcom='.$_GET['idcom']);
    }
}

