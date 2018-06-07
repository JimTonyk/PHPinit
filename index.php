<!--
/* 
 *Amélioration de la lisibilité et de la clarté du code
 *Blog version 2.0
 *Auteur : JM. Hiltbrunner
*/ -->

<?php
require('modeleBillets.php');

$display = getBillets();
$nbPages = getNbPages();


require('affichageAccueil.php');


  
