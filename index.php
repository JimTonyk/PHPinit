<!--
/* 
 *Converting a basic blog written in PHP in MVC PHP-designed pattern blog
 *Version 2.0
 *Author: JM. Hiltbrunner
*/ -->

<?php
require('\controller\frontend.php');

/**Verify if an action is performed and execute it if designed in global controller
 * Else display an error that action is not present in our server
 * At beginning of this blog, assuming that all posts are displayed
 */

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listBillets') {
        listBillets();
    }
    
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['billet']) AND $_GET['billet']>0) {
            post();
        }
         else {
            echo 'Erreur: aucun billet avec cette référence existe sur ce site';
        }
    }
    
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['billet']) AND $_GET['billet']>0) {
            if (!empty($_POST['author']) and !empty($_POST['comment'])) {
                addComment($_GET['billet'],$_POST['author'],$_POST['comment']);
            }
            else {
                echo 'Erreur : Tous les champs de commentaires ne sont pas remplis. Vérifiez.';
            }
        }
        else {
            echo 'Erreur: aucun billet avec cette référence existe sur ce site';
        } 
    }
   
}

else {
    listBillets();
}
