<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="author" lang="cs" content="" />
    <meta name="yousef" lang="cs" content="" />
    <meta name="Cours" content="..." />
    <meta name="keywords" content="..." />
    <meta name="robots" content="all,follow" />
    <link href="css/styleyoss.css" type="text/css" rel="stylesheet"/>
    <title>Cours Web et Base de Données</title>
</head>
<?php
//ici je lie le fichier de mes fonction d'insertion
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
            <li><a href="search.php">Recherche</a></li>
            <li id="active"><a href="insert.php">Insérer un livre</a></li>
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
                    Sur cette page, vous allez pouvoir insérer un livre au sein de la bibliothèque.<br/>
                    Pour cela, vous devez remplir le formualire ci-dessous. Vous pouvez choisir dans la liste deroulante pour chaque catégorie mais si jamais vous ne trouvez pas ce que vous voulez mettre, cochez la case "Autre" et renseignez le champ texte a côté.<br/>
                    <?php
                        if (isset($_GET["titre"]))
                            echo "<h1>".insertBookCustom()."</h1>";
                    ?>
                </p>
            </div>
            
            
            <!-- Rien d'original je fais les memes choses que les autres pages mais en général 
            Ce que j'ai fait ici est un formulaire je fais beaucp de boucle qui vont boucler sur mes fonctions qui des fois 
            vont envoyer un tableau. La seule particularité ici sont les conditions et les traitements que j'ai fais en bas
            -->
    
        </div>
        <div id="contenu" class="content box">
            <div class="in">
                <h2>Insérer un livre</h2>
                <table>
                <form method="get" action="#">
                    <tr><td>
                        <label for="titre">Titre :</label>
                        </td><td>
                        <input type="text" name="titre"/><br/><br/>
                        </td></tr>
                    <tr><td>
                            <label for="desc">Description :</label>
                        </td><td>
                            <input type="text" name="desc"/><br/><br/>
                        </td></tr>
                    <tr><td>
                            <label for="desc">URL de lecture : </label>
                        </td><td>
                            <input type="text" name="url"/><br/><br/>
                        </td></tr>


                    <tr><td>
                <label for="langue">Langue :</label>
                        </td><td>
                    <select name="langue_valeur">
                        <?php
                        foreach (getLangues() as $langue) {
                            echo "<option value=\"".$langue["id"]."\">".$langue["name"]."</option>";
                        }
                        ?>
                    </select><br/>
                        <input type="checkbox" name="langue" id="langue"/>
                        Autre : <input type="text" name="langue_autre"/>
                        </td></tr>
                    <tr><td>
                        <label for="annee">Annee :</label>
                        </td><td>
                    <select name="annee_valeur">
                        <?php
                        foreach (getAnnees() as $annee) {
                            echo "<option value=\"".$annee["id"]."\">".$annee["name"]."</option>";
                        }
                        ?>
                    </select><br/>
                        <input type="checkbox" name="annee" id="annee"/>
                            Autre : <input type="text" name="annee_autre"/>

                        </td></tr>

                    <tr><td>
                            <label for="lieu">Lieu :</label>
                        </td><td>
                            <select name="lieu_valeur">
                                <?php
                                foreach (getLieus() as $annee) {
                                    echo "<option value=\"".$annee["id"]."\">".$annee["name"]."</option>";
                                }
                                ?>
                            </select><br/>
                            <input type="checkbox" name="lieu" id="lieu"/>
                            Autre : <input type="text" name="lieu_autre"/>

                        </td></tr>


                    <tr><td>
                        <label for="auteur">Auteur :</label>
                        </td><td>
                    <select name="auteur_valeur">
                        <?php
                        foreach (getAuteurs() as $auteur) {
                            echo "<option value=\"".$auteur["id"]."\">".strtoupper($auteur["nom"])." ". $auteur["prenom"] ."</option>";
                        }
                        ?>
                    </select><br/>
                        <input type="checkbox" name="auteur" id="auteur"/>
                            Autre : Prenom : <input type="text" name="auteurp_autre"/> Nom : <input type="text" name="auteurn_autre"/>

                        </td></tr>
                    <tr><td>
                        <label for="genre">Genre :</label>
                        </td><td>
                    <select name="genre_valeur">
                        <?php
                        foreach (getGenres() as $genre) {
                            echo "<option value=\"".$genre["id"]."\">".$genre["name"] ."</option>";
                        }
                        ?>
                    </select><br/>
                        <input type="checkbox" name="genre" id="genre"/>
                            Autre : <input type="text" name="genre_autre"/>
                    </tr>
                    <tr><td colspan="2">
                            <input type="submit" value="Insérer"/>
                        </td>
                    </tr>

                </form>
                </table>
                <div class="clear"></div>

            </div>
        </div>
        <!-- end/ contenu-->
        <div>

            <!-- footer -->
            <div id="footer" class="shadow">
                <div class="f-left"> <a href="#">YOUSEF</a></div>
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
//je définis une fonctions afin d'insérer un livre costumisé 
function insertBookCustom() {
// je dis si le champ de titre n'est pas rempli ne pas inséerer 
    if (empty($_GET["titre"]))
        return "Titre non rempli";
    if (empty($_GET["desc"]))
        return "Description non remplie";
    if (empty($_GET["url"]))
        return "Url de lecture non remplie";
        //si le case de langue est coché dans  mon formulaire et elle est vide recupere la valeure de langue_autre
    if ($_GET["langue"] == "on" && empty($_GET["langue_autre"]))
        return "Langue non remplie";
    if ($_GET["annee"] == "on" && empty($_GET["annee_autre"]))
        return "Année non remplie";
    if ($_GET["auteur"] == "on" && (empty($_GET["auteurp_autre"]) || empty($_GET["auteurn_autre"])))
        return "Auteur non rempli";
    if ($_GET["genre"] == "on" && empty($_GET["genre_autre"]))
       return "Genre non rempli";
    if ($_GET["lieu"] == "on" && empty($_GET["lieu_autre"]))
        return "Lieu non rempli";
    $nomLivre = $_GET["titre"];
    $desc = $_GET["desc"];
    if ($_GET["langue"] == "on") {
        $langue = $_GET["langue_autre"];
    } else {
    //si la case n'est pas coché on recupere la langue par son id à laide de la fonction
        $langue = getLangueByID($_GET["langue_valeur"]);
        $langue = $langue["name"];
    }
    if ($_GET["annee"] == "on") {
        $annee = $_GET["annee_autre"];
    } else {
        $annee = getAnneeByID($_GET["annee_valeur"]);
        $annee = $annee["name"];
    }
    if ($_GET["auteur"] == "on") {
        $auteurPrenom = $_GET["auteurp_autre"];
        $auteurNom = $_GET["auteurn_autre"];
    } else {
        $auteur = getAuteurByID($_GET["auteur_valeur"]);
        $auteurPrenom = $auteur["prenom"];
        $auteurNom = $auteur["nom"];
    }
    if ($_GET["genre"] == "on") {
        $genre = $_GET["genre_autre"];
    } else {
        $genre = getGenreByID($_GET["genre_valeur"]);
        $genre = $genre["name"];
    }
    if ($_GET["lieu"] == "on") {
        $lieu = $_GET["lieu_autre"];
    } else {
        $lieu = getLieuByID($_GET["lieu_valeur"]);
        $lieu = $lieu["name"];
    }

    insert_livre($nomLivre, $desc, $langue, $genre, $annee, $auteurNom, $auteurPrenom, $lieu, $_GET["url"]);
    return "Livre enregistré";
}

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
