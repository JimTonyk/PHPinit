<?php

require_once('model\PostManager.php');
require_once('model\CommentManager.php');

//Controller displaying all posts group by 5-pack
function listBillets() {
    $postManager = new PostManager();
    
    $display = $postManager -> getBillets();
    $nbPages = $postManager -> getNbPages();
    
    require('view\frontend\listBilletsView.php');
}

//Controller that assumes displaying one post and its comments
function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    
    $post = $postManager -> getBillet($_GET['billet']);
    $comments = $commentManager -> getComments($_GET['billet']);
    
    require('view\frontend\postView.php');
}

//Controller able to post comments on each post
function addComment($billet ,$author, $comment) {
    $commentManager = new CommentManager();
    
    $postComment = $commentManager -> postComment($billet, $author, $comment);
    
    if($postComment === false) {
        throw new Exception('Le commentaire n\'a pas été ajouté. Essayez plus tard.');
    }
    else {
        header('Location: index.php?action=post&billet='.$billet);
    }
}
