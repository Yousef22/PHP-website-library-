<?php
error_reporting(-1);
ini_set('display_errors', 'On');



/*
ici vous trouvez toutes mes fonctions de rechercher un livre soit par auteur année langue ou meme genre
je définis une fonction 
je fais appel à ma fonction qui va à sa tour verifier la conexion à la base de données si la conexion s'ehoue retourn null
je prépare ma requete sql j
je bindparam // définitiondes parametres pour  sécuriser les variables
j'execute 
je fetch et je fais une condition si le resultat n'est pas empty y abien quelque chose retourne le sinon retourne null


ET C'est la meme choses pour les autres fonction à part la fonction getMoyenneLivre où je me suis renseigner et fais la meme
chose dans ce lien opencmlassroom https://openclassrooms.com/forum/sujet/php-calculer-moyenne-60722

*/
function searchLangue($langue) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Langue WHERE name = :langue";
    $langueSearch = $bdd->prepare($query);
    $langueSearch->bindParam(":langue", $langue);
    $langueSearch->execute();

    $resultat = $langueSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getLangues() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Langue";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;

}

function getLangueByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT name FROM Langue WHERE id = '$id'";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function searchNotes($idLivre) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Note WHERE livreID = :idLivre";
    $notesSearch = $bdd->prepare($query);
    $notesSearch->bindParam(":idLivre", $idLivre);
    $notesSearch->execute();
    $resultat = $notesSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getMoyenneLivre($idLivre) {
    if (searchNotes($idLivre) == null) {
        return "Aucune note actuellement";
    } else {
        $i = 0;
        $moy = 0;
        foreach (searchNotes($idLivre) as $note) {
            $i = $i + 1;
            $moy += $note["note"];
        }
        $moy = $moy / $i;
        return $moy;
    }
}

function searchAnnee($annee) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Annee WHERE name = :annee";
    $anneeSearch = $bdd->prepare($query);
    $anneeSearch->bindParam(":annee", $annee);
    $anneeSearch->execute();

    $resultat = $anneeSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getAnnees() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Annee";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getAnneeByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT name FROM Annee WHERE id = '$id'";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;

}


function searchGenre($genre) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Genre WHERE name = :genre";
    $genreSearch = $bdd->prepare($query);
    $genreSearch->bindParam(":genre", $genre);
    $genreSearch->execute();

    $resultat = $genreSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function searchLieu($lieu) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Lieu WHERE name = :lieu";
    $lieuSearch = $bdd->prepare($query);
    $lieuSearch->bindParam(":lieu", $lieu);
    $lieuSearch->execute();

    $resultat = $lieuSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}


function getGenres() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Genre";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getGenreByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT name FROM Genre WHERE id = '$id'";
    $langueSearch = $bdd->query($query);
    $resultat = $langueSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}



function searchAuteur($auteurNom, $auteurPrenom) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Auteur WHERE nom = :nom AND prenom = :prenom";
    $auteurSearch = $bdd->prepare($query);
    $auteurSearch->bindParam(":nom", $auteurNom);
    $auteurSearch->bindParam(":prenom", $auteurPrenom);
	$auteurSearch->execute();
	$resultat = $auteurSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getAuteurs() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Auteur";
    $auteurSearch = $bdd->query($query);
    $resultat = $auteurSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getLieus() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Lieu";
    $lieuSearch = $bdd->query($query);
    $resultat = $lieuSearch->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}

function getLieuByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT * FROM Lieu WHERE id = '$id'";
    $lieuSearch = $bdd->query($query);
    $resultat = $lieuSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}


function getAuteurByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT nom, prenom FROM Auteur WHERE id = '$id'";
    $auteurSearch = $bdd->query($query);
    $resultat = $auteurSearch->fetch(PDO::FETCH_ASSOC);
    if (!empty($resultat))
        return $resultat;
    else
        return null;
}


function searchLivre($titre) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT 
              b.titre AS Titre, 
              b.descriptif AS Descriptif,
              b.url AS Lien,
              g.name AS Genre, 
              a.name AS Annee, 
              o.nom AS NomAuteur, 
              o.prenom AS PrenomAuteur, 
              l.name AS Langue
              FROM 
              Livre b, 
              Genre g, 
              Annee a, 
              Auteur o, 
              Langue l
              WHERE b.titre = '$titre' AND 
              g.id = b.genreID AND 
              a.id = b.anneeID AND
              o.id = b.auteurID AND 
              l.id = b.langueID";
    $result = $bdd->query($query);

    $resultat = $result->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}

function searchBookByID($id) {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT 
              b.id AS Id,
              b.titre AS Titre, 
              b.descriptif AS Descriptif,
              b.url AS Lien,
              g.name AS Genre, 
              a.name AS Annee, 
              o.nom AS NomAuteur, 
              o.prenom AS PrenomAuteur, 
              l.name AS Langue
              FROM 
              Livre b, 
              Genre g, 
              Annee a, 
              Auteur o, 
              Langue l
              WHERE 
              g.id = b.genreID AND 
              a.id = b.anneeID AND
              o.id = b.auteurID AND 
              l.id = b.langueID AND 
              b.id = '$id'";
    $result = $bdd->query($query);
    $resultat = $result->fetch(PDO::FETCH_ASSOC);
    return $resultat;

}

function getAllBooks() {
    $bdd = try_connection();
    if ($bdd == false)
        return null;
    $query = "SELECT 
              b.id AS Id,
              b.titre AS Titre, 
              b.descriptif AS Descriptif,
              b.url AS Lien,
              g.name AS Genre, 
              a.name AS Annee, 
              o.nom AS NomAuteur, 
              o.prenom AS PrenomAuteur, 
              l.name AS Langue
              FROM 
              Livre b, 
              Genre g, 
              Annee a, 
              Auteur o, 
              Langue l
              WHERE 
              g.id = b.genreID AND 
              a.id = b.anneeID AND
              o.id = b.auteurID AND 
              l.id = b.langueID";
    $result = $bdd->query($query);
    $resultat = $result->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;

}
