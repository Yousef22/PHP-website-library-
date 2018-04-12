<?php

//Je lie mes fichiers
require_once 'database.php';
require_once 'SearchFunctions.php';

// ici je définis toutes mes fonctions d'insertions 


// fonction pour insérer le genre 
// je fais à appel à ma fonction tryconnection par une variable temporaire pour vérifier la bonne connexion si connecté continue sinon return false
//une condition sur la fonction searchGenre 
//si elle n'est pas null retourne le genre(valeur)
// je fais ma requete sql 
//je prépare et je bind pour sécuriser mes variables
//puis j'execute 
//une condition pour vérifier executé si oui et pas de probleme retourn le genre recherché sinon retourn false 
function insert_genre($genre) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    if (searchGenre($genre) != null)
        return searchGenre($genre);
    $query = "INSERT INTO Genre (name) VALUES (:genre)";
    $genreInserted = $bdd->prepare($query);
	$genreInserted->bindParam(":genre", $genre);
    $result = $genreInserted->execute();
    if ($result)
        return searchGenre($genre);
    else
        return false;
}
//Pareil avec le lieu
function insert_lieu($lieu) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    if (searchLieu($lieu) != null)
        return searchLieu($lieu);
    $query = "INSERT INTO Lieu (name) VALUES (:lieu)";
    $lieuInserted = $bdd->prepare($query);
    $lieuInserted->bindParam(":lieu", $lieu);
    $result = $lieuInserted->execute();
    if ($result)
        return searchLieu($lieu);
    else
        return false;

}
//same here
function insert_annee($annee) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    if (searchAnnee($annee) != null)
        return searchAnnee($annee);
    $query = "INSERT INTO Annee (name) VALUES (:annee)";
    $anneeInserted = $bdd->prepare($query);
	$anneeInserted->bindParam(":annee", $annee);
    $result = $anneeInserted->execute();
    if ($result)
        return searchAnnee($annee);
    else
        return false;
}
//encore
function insert_auteur($auteurNom, $auteurPrenom) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    if (searchAuteur($auteurNom, $auteurPrenom) != null)
        return searchAuteur($auteurNom, $auteurPrenom);
    $query = "INSERT INTO Auteur (nom, prenom) VALUES (:nom, :prenom)";
    $auteurInserted = $bdd->prepare($query);
    $auteurInserted->bindParam(":nom", $auteurNom);
    $auteurInserted->bindParam(":prenom", $auteurPrenom);
    $result = $auteurInserted->execute();
    if ($result)
        return searchAuteur($auteurNom, $auteurPrenom);
    else
        return false;
}
//encore
function insert_note($note, $comment, $idLivre) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    $query = "INSERT INTO Note (livreID, note, commentaire) VALUES (:livre, :note, :comment)";
    $noteInserted = $bdd->prepare($query);
    $noteInserted->bindParam(":livre", $idLivre);
    $noteInserted->bindParam(":note", $note);
    $noteInserted->bindParam(":comment", $comment);
    $result = $noteInserted->execute();
    if ($result)
        return true;
    else
        return false;
}
//désolé mais meme chose 
function insert_langue($langue) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    if (searchLangue($langue) != null)
        return searchLangue($langue);
    $query = "INSERT INTO Langue (name) VALUES (:langue)";
    $langueInserted = $bdd->prepare($query);
    $langueInserted->bindParam(":langue", $langue);
    $result = $langueInserted->execute();
    if ($result)
        return searchLangue($langue);
    else
        return false;
}
//ici j'ai eu beaucoup de problèmes de nommage et d'oublier quelques variable ou parammetres et l'erreur
//Warning: PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: 
//number of bound variables does not match number of tokens in 
//Applications/MAMP/htdocs/Cours/InsertFunctions.php on line 135 ou 126 ou 127 m'a bien empeté mais résoulu à la fin 
function insert_livre($nomLivre, $descriptifLivre, $langue, $genre, $annee, $nomAuteur, $prenomAuteur, $lieu, $url) {
    $bdd = try_connection();
    if ($bdd == false)
        return false;
    $langue = insert_langue($langue);
    $auteur = insert_auteur($nomAuteur, $prenomAuteur);
    $genre = insert_genre($genre);
    $annee = insert_annee($annee);
    $lieu = insert_lieu($lieu);
    $query = "INSERT INTO Livre (titre, descriptif, langueID, auteurID, genreID, anneeID, lieuID, url) 
              VALUES (:titre, :descriptif, :langue, :auteur, :genre, :annee, :lieu, :url)";
    $livreInserted = $bdd->prepare($query);
    $livreInserted->bindParam(":titre", $nomLivre);
    $livreInserted->bindParam(":descriptif", $descriptifLivre);
    $livreInserted->bindParam(":langue", $langue["id"]);
    $livreInserted->bindParam(":auteur", $auteur["id"]);
	$livreInserted->bindParam(":genre", $genre["id"]);
	$livreInserted->bindParam(":annee", $annee["id"]);
	$livreInserted->bindParam(":lieu", $lieu["id"]);
    $livreInserted->bindParam(":url", $url);
    $livreInserted->execute();
    
}