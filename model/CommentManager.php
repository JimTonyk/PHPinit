<?php
namespace org\formation\php\model;

require_once('Manager.php');

class CommentManager extends Manager{
    
    /**
    * This function allow server to pick-out all comments to one article from database
    *
    *@param id reference of article_id in database 'coments'
    */
    public function getComments($id){
        $db = $this -> init();
    
        $comments = $db -> prepare('Select id, pseudo, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') as datecom from commentaires where id_article = ? order by datecom desc') or die(print_r($db->errorInfo()));
        $comments -> execute(array($id));
        
        return $comments;
    }
    
    public function getComment($idComment){
        $db = $this -> init();
        
        $request = $db -> prepare('SELECT pseudo, commentaire FROM commentaires WHERE id = ?') or die(print_r($db->errorInfo()));
        $request -> execute(array($idComment));
        
        return $request;
    }
    
    /**
    * This function allow server to add a comment on an article written in the dedicated interface
    *
    *@param article reference of atricle_id in database 'comments'
    *@param author user name of people who has written the comment
    *@param comment comment written in the section 'comment' of form
    *
    *@return comment added to database which can be used by controller and view pages
    */
    public function postComment($billet, $author, $comment){
        $db= $this -> init();
        
        $newComment = $db -> prepare('INSERT into commentaires(id_article, pseudo, commentaire, date_commentaire) values (?, ?, ?, now())') or die(print_r($db->errorInfo()));
        $addComment = $newComment -> execute(array($billet ,$author, $comment));
        
        return $addComment;
    }
    
    /**
    * This function allow server to modify a comment on an article written in the dedicated interface
    *
    *@param id reference of id (primary key) of comment in table 'comments'
    *@param comment comment written in the section 'comment' of form
    *
    *@return comment added to database which can be used by controller and view pages
    */
    public function updateComment($comment, $id){
        $db = $this -> init();
        
        echo 'test model';
        $updateComment = $db -> prepare('UPDATE commentaires SET commentaire = ? WHERE commentaires.id = ?') or die(print_r($db->errorInfo()));
        $updatedComment = $updateComment -> execute(array($comment, $id));
        return $updatedComment;
    }
    
}
