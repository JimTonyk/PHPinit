<?php

/* 
 *Converting a basic blog written in PHP in MVC PHP-designed pattern blog
 *Version 2.0
 *Author: JM. Hiltbrunner
*/

require('\controller\frontend.php');

/**
 * Verify if an action is performed and execute it if designed in global controller
 * Else display an error that action is not present in our server
 * At beginning of this blog, assuming that all posts are displayed
 */

try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listBillets') {
            listBillets();
            }
    
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['billet']) AND $_GET['billet']>0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    
        else if($_GET['action'] == 'comment'){
            if(isset($_GET['idcom']) AND $_GET['idcom']>0) {
                getComment($_GET['idcom']);
            }
            else {
                throw new Exception('Cet identifiant de commentaire n\'existe pas dans la base de données. Veuillez vérifier l\'information');
            }
        }
        
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['billet']) AND $_GET['billet']>0) {
                if (!empty($_POST['author']) and !empty($_POST['comment'])) {
                    addComment($_GET['billet'],$_POST['author'],$_POST['comment']);
                }
                else {
                    throw new Exception('Erreur : Tous les champs de commentaires ne sont pas remplis. Vérifiez.');
                }
            }
            else {
                throw new Exception('Erreur: aucun billet avec cette référence existe sur ce site');
            } 
        }
        
        elseif($_GET['action'] == 'updateComment'){
            if (isset($_GET['idcom']) AND $_GET['idcom']>0) {
                if (!empty($_POST['Ucomment'])) {
                    updateComment($_POST['Ucomment'],$_GET['idcom']);
                }
                else {
                    throw new Exception('Erreur : Le champ commentaire ne peut pas être vide');
                }
            }
            else {
                throw new Exception('Erreur: aucun billet avec cette référence existe sur ce site. La page n\'a pas été modifiée');
            } 
        }
   
    }
    else {
        listBillets();
    }
}
catch(Exception $e){
    $errorMessage = $e -> getMessage();
    require('\view\frontend\errorView.php');
}
