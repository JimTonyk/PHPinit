<!--
/* 
 *Converting a basic blog written in PHP in MVC PHP-designed pattern blog
 *Version 2.0
 *Author: JM. Hiltbrunner
*/ -->

<?php
require('\controller\controller.php');

/**Verify if an action is performed and execute it if designed in global controller
 * Else display an error that action is not present in our server
 * At beginning of this blog, assuming that all post are displayed
 */

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listBillets') {
        listBillets();
    }
    
    elseif ($_GET['action'] == 'post') {
        post();
    }
    else {
        echo 'Erreur: cette opération n\'est pas disponible';
    }
}

else {
    listBillets();
}
