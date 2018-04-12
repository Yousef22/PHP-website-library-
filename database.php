<?php
/*
C'est ma première fonction réussite après plusieurs essais. la raison pour la quelle je l'ai faite est de me faciliter 
la tache au lieu de l'appeler à chaque fois je fais appel à la fonction.

Vu que c'est une fonction il faut un return alors j'ai dit c'est la connexion est bonne c'est ok en cas de problème 
retourne false et arrete au lieu de faire un echo et un die tout simplement ca s'arrete
*/
function try_connection() {
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=projet", "root", "root", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    } catch (Exception $e) {
    //echo "Erreur de connexion à la base de données " . $e->getMessage() ;
    // die();
        return false;
    }
}