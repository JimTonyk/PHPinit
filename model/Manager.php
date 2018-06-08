<?php
class Manager{
    protected function init(){
        $db = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
        return $db;
    }
}