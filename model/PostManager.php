<?php
namespace org\formation\php\model;

require_once('Manager.php');

class PostManager extends Manager{
    
    public function getBillets(){
        $db = $this -> init();
        if(isset($_GET['page'])){
            $display = $db->query('Select * from billets order by id asc limit '.(($_GET['page']-1)*5).',5') or die(print_r($db->errorInfo()));
        }
        else{
            $display = $db->query('Select * from billets order by id asc limit 0,5');
        }
        return $display;
    }
    
    public function getBillet($id){
    $db = $this -> init();
    
    $request = $db -> prepare('SELECT * from billets where id = ?') or die(print_r($db->errorInfo()));
    $request -> execute(array($id));
    $billet = $request -> fetch();
    return $billet;
    }
    
    public function getNbPages(){
        $db = $this -> init();
    
        $selectCount = $db ->query('Select COUNT(*) as nb_billets from billets') or die(print_r($db->errorInfo()));
        $count = $selectCount->fetch();
        return $count['nb_billets']/5;
    }
    
}
