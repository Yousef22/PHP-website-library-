<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="yousef" lang="cs" content="" />
    <link href="css/styleyoss.css" type="text/css" rel="stylesheet"/>
    <title>Cours Web et Base de Données</title>
</head>
<?php
include_once 'InsertFunctions.php';
?>
<body>
<!-- lise en page -->
<div id="layout">

    <!-- titre -->
    <div id="header">

        <h1 id="logo"><a href="./" title="Cours Web et Base de Données">Cours Web et Base de Données</a></h1>
        <hr class="noscreen" />


    </div>
    <!-- end/ titre -->

    <hr class="noscreen" />

    <!-- navigation -->
    <div id="nav" class="box">
        <ul>
            <li><a href="index.php">Accueil</a></li> <!-- page current -->
            <li id="active"><a href="search.php">Recherche</a></li>
            <li><a href="insert.php">Insérer un livre</a></li>

        </ul>
        <hr class="noscreen" />
    </div>
    <!-- end/ navigation -->

    <div id="container" class="box">

        <!-- contenu-->


        <div id="intro">
            <div id="intro-in">
                <h2>Recherche</h2>
                <p class="intro">
                    Sur cette page, vous allez pouvoir effectuer une recherche en combinant (ou non) les différentes options qui s'offrent a vous. <br/>
                    Pour activer une option, vous devez tout d'abord cocher la case correspondante au critère que vous avez choisi.
                    Vous pouvez bien sur en combiner plusieures !
                </p>
            </div>
        </div>
        <div id="contenu" class="content box">
            <div class="in">
                <h2>Filtres de votre recherche</h2>
                <form method="get" action="#">
                    <p>
                        <label for="langue">Langue :</label>
                        <input type="checkbox" name="langue" id="langue"/>
                        <select name="langue_valeur">
                            <?php
                            foreach (getLangues() as $langue) {
                                echo "<option value=\"".$langue["id"]."\">".$langue["name"]."</option>";
                            }
                            ?>
                        </select><br/><br/>
                        <label for="annee">Annee :</label>

                        <input type="checkbox" name="annee" id="annee"/>
                        <select name="annee_valeur">
                            <?php
                            foreach (getAnnees() as $annee) {
                                echo "<option value=\"".$annee["id"]."\">".$annee["name"]."</option>";
                            }
                            ?>
                        </select><br/><br/>
                        <label for="auteur">Auteur :</label>
                        <input type="checkbox" name="auteur" id="auteur"/>
                        <select name="auteur_valeur">
                            <?php
                            foreach (getAuteurs() as $auteur) {
                                echo "<option value=\"".$auteur["id"]."\">".strtoupper($auteur["nom"])." ". $auteur["prenom"] ."</option>";
                            }
                            ?>
                        </select><br/><br/>
                        <label for="genre">Genre :</label>
                        <input type="checkbox" name="genre" id="genre"/>
                        <select name="genre_valeur">
                            <?php
                            foreach (getGenres() as $genre) {
                                echo "<option value=\"".$genre["id"]."\">".$genre["name"] ."</option>";
                            }
                            ?>
                        </select><br/><br/>
                        <input type="submit" value="Rechercher"/>
                    </p>
                </form>
                <div class="clear"></div>

            </div>
            <?php
            if (isset($_GET["langue"]) || isset($_GET["annee"]) || isset($_GET["auteur"]) || isset($_GET["genre"])) {
                ?>
                <h3>Votre recherche</h3>
                <table class="books">
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Note moyenne</th>
                        <th>Fiche du livre</th>
                    </tr>
                    <?php
                    foreach (searchLivreCustom() as $book) {
                        echo "<tr>";
                        echo "<td>";
                        echo $book["Titre"];
                        echo "</td>";
                        echo "<td>";
                        echo $book["NomAuteur"]. " ".$book["PrenomAuteur"];
                        echo "</td>";
                        echo "<td>";
                        echo getMoyenneLivre($book["Id"]);
                        echo "</td>";
                        echo "<td>";
                        echo "<a href=\"details.php?id=".$book["Id"]."\"> Cliquez ici </a>";
                        echo "</td>";
                    }

                    ?>
                </table>
            <?php } ?>
        </div>
        <!-- end/ contenu-->
        <div>

            <!-- footer -->
            <div id="footer" class="shadow">
                <div class="f-left"><a href="#">YOUSEF</a></div>
            </div>
        </div>
        <!-- end/ footer -->
        <!-- validation -->
        <p>
            <a href="http://validator.w3.org/check?uri=referer"><img
                    src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
        </p>
    </div>
</div>
</body>
</html>
<?php
function searchLivreCustom() {
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

    if ($_GET["langue"] == "on") {
        $idLangue = $_GET["langue_valeur"];
        $query .= " AND ";
        $query .= "b.langueID = ".$idLangue;
    }
    if ($_GET["annee"] == "on") {
        $idAnnee = $_GET["annee_valeur"];
        $query .= " AND ";
        $query .= "b.anneeID = ".$idAnnee;
    }
    if ($_GET["auteur"] == "on") {
        $idAuteur = $_GET["auteur_valeur"];
        $query .= " AND ";
        $query .= "b.auteurID = ".$idAuteur;
    }
    if ($_GET["genre"] == "on") {
        $idGenre = $_GET["genre_valeur"];
        $query .= " AND ";
        $query .= "b.genreID = ".$idGenre;
    }

    $result = $bdd->query($query);
    $resultat = $result->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;

}
?>
