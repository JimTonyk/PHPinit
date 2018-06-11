<?php
namespace org\formation\php\model;

/**
* General configuration od database connection for execution SQL requests
*
*@author
*/

class Manager{
    
    /*
    *Realizing connection to mySQL database 'miniblog' with dedicated user and password
    *Do not forget to update 'root' and '' if these data are false!
    */
    protected function init(){
        $db = new \PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
        return $db;
    }
}