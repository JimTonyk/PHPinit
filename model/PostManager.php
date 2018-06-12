<?php
namespace org\formation\php\model;

require_once('Manager.php');

/**
 * This class allow read operations on posts published by author in order to being read by users
 * Another model class will be published for CRUD Operations in posts
 * 
 * @author JM. Hiltbrunner
 */
class PostManager extends Manager{
    
    /**
     * Get 5 posts published by admin sorted by date and their id.
     * TODO: change publication date as an European format
     *
     * @return Array of 5 posts maximum with title, post content and publication date
     */
    public function getBillets(){
        $db = $this -> init();
        if(isset($_GET['page'])){
            $display = $db->query('Select * from posts order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($db->errorInfo()));
        }
        else{
            $display = $db->query('Select * from posts order by id asc limit 0,5');
        }
        return $display;
    }
    
    /**
     * Get a post selected by its identification number.
     * TODO: change publication date as an European format
     *
     * @return Array of 5post selected with title, post content and publication date
     */
    public function getBillet($id){
    $db = $this -> init();
    
    $request = $db -> prepare('SELECT * from posts where id = ?') or die(print_r($db->errorInfo()));
    $request -> execute(array($id));
    $billet = $request -> fetch();
    return $billet;
    }
    
    /**
     * Determine number of pages to be displayed. Each page has 5 posts published, whatever their content
     * 
     * @return Integer of number of pages displayed for all posts.
     */
    public function getNbPages(){
        $db = $this -> init();
    
        $selectCount = $db ->query('Select COUNT(*) as nb_posts from posts') or die(print_r($db->errorInfo()));
        $count = $selectCount->fetch();
        return $count['nb_posts']/5;
    }
    
}
