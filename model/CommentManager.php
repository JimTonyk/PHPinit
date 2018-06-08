<?php
require_once('Manager.php');

class CommentManager extends Manager{
    public function getComments($id){
        $db = $this -> init();
    
        $comments = $db -> prepare('Select id, pseudo, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') as datecom from commentaires where id_article = ? order by datecom desc') or die(print_r($db->errorInfo()));
        $comments -> execute(array($id));
        return $comments;
    }
    
    function postComment($billet, $author, $comment){
        $db= $this -> init();
        
        $newComment = $db -> prepare('INSERT into commentaires(id_article, pseudo, commentaire, date_commentaire) values (?, ?, ?, now())') or die(print_r($db->errorInfo()));
        $addComment = $newComment -> execute(array($billet ,$author, $comment));
        return $addComment;
    }
    
}
