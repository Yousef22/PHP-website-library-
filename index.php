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
//ici je lie le fichier de mes fonction d'insertion

    require_once 'InsertFunctions.php';
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
            <li id="active"><a href="index.php">Accueil</a></li> <!-- page current -->
            <li><a href="search.php">Recherche</a></li>
            <li><a href="insert.php">Insérer un livre</a></li>

        </ul>
        <hr class="noscreen" />
    </div>
    <!-- end/ navigation -->

    <div id="container" class="box">

        <!-- contenu-->


        <div id="intro">
            <div id="intro-in">
                <h2>Bienvenue dans notre bibliothèque</h2>
                <p class="intro">
                    Bienvenue sur notre bibliothèque commune. Vous pouvez ici visualiser les livres de la collection mais aussi en ajouter ou faire une recherche spécifique. <br>

                </p>
            </div>
        </div>
        <div id="contenu" class="content box">
            <h3>Notre collection entière</h3>
            <table class="books">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Note moyenne</th>
                    <th>Fiche du livre</th>
                </tr>
                <?php
                //je fais une boucle pour afficher tous les livre //foreach va passer, et lors de chaque passage, 
                //elle va mettre la valeur récuper par la fonction dans une variable temporaire (par exemple$book).
                    foreach (getAllBooks() as $book) {
                        echo "<tr>";
                        echo "<td>";
                        echo $book["Titre"];//affiche le titre
                        echo "</td>";
                        echo "<td>";
                        echo $book["NomAuteur"]. " ".$book["PrenomAuteur"];
                        echo "</td>";
                        echo "<td>";
                        echo getMoyenneLivre($book["Id"]);//recupere la moyenne par id
                        echo "</td>";
                        echo "<td>";
                        echo "<a href=\"details.php?id=".$book["Id"]."\"> Cliquez ici </a>";
                        echo "</td>";
                    }

                ?>
            </table>
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
</body>
</html>
