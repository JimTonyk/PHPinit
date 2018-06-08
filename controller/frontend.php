<?php

require('model\frontend.php');

//Controller displaying all posts group by 5-pack
function listBillets() {
    $display = getBillets();
    $nbPages = getNbPages();
    
    require('view\frontend\listBilletsView.php');
}

//Controller that assumes displaying one post and its comments
function post() {
    $post = getBillet($_GET['billet']);
    $comments = getComments($_GET['billet']);
    
    require('view\frontend\postView.php');
}

//Controller able to post comments on each post
function addComment($billet ,$author, $comment) {
    $postComment = postComment($billet, $author, $comment);
    
    if($postComment === false) {
        throw new Exception('Le commentaire n\'a pas été ajouté. Essayez plus tard.');
    }
    else {
        header('Location: index.php?action=post&billet='.$billet);
    }
}
