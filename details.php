<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="yousef" lang="cs" content="" />
    <meta name="Cours" content="..." />
    <link href="css/styleyoss.css" type="text/css" rel="stylesheet"/>
    <title>Cours Web et Base de Données</title>
</head>
<?php
// ici je lie le fichier de mes fonction d'insertion
require_once 'InsertFunctions.php';
$idLivre = $_GET["id"];
// je verifie l'existance de  mes variables avec isset après je fais appel à ma fonction insert_note pour inséerer
if (isset($_GET["note"]) && isset($_GET["comment"]))
    insert_note($_GET["note"], $_GET["comment"], $idLivre);
    //deux varibles définies afin de faire appel aux fonctions pour permettre d'affichier le livre par son id
$book = searchBookByID($idLivre);
$notes = searchNotes($idLivre);
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
            <li><a href="insert.php">Insérer un livre</a></li>

        </ul>
        <hr class="noscreen" />
    </div>
    <!-- end/ navigation -->

    <div id="container" class="box">

        <!-- contenu-->


        <div id="contenu" class="content box">
            <div class="in">
                <div class="title">
                    <p>
                    <!--ici j'introduis de php afin d'afficher le le nom et le prénom de l'auteur concténés j'affiche avec 
                    echo et je concatene avec le .
                    Pareil pour l'année et la langue
                    -->
                    <h2><?php echo $book["NomAuteur"]. " ".$book["PrenomAuteur"]; ?></h2>
                    <h5><?php echo $book["Annee"]; ?></h5>
                    <P>Genre : <?php echo $book["Genre"]; ?></p> <br/>
                    <p>Disponible en <?php echo $book["Langue"]; ?></p>

                    </p>
                </div>
                <!-- div pour la description
                pour afficher le titre la description et le lien
                Ici j'ai fais un mélange xhtml php afin d'afichier le lien 
                -->
                <div class="descriptif">
                    <h1><?php echo $book["Titre"]; ?></h1>
                    <?php echo $book["Descriptif"]; ?><br/>
                    <? if (!empty($book["Lien"])) { echo "<a href=".$book["Lien"].">Lire le livre</a>"; } ?>

                </div>
                <div class="clear"></div>
            <ul class="columns">
                <li class="col2">
                    <h3>Notes</h3>
                    <table>
                        <tr>
                            <th>Note</th>
                            <th>Commentaire</th>
                        </tr>
                        <?php
                        // j'ai fait une table en haut et ici je fais une boucle pou
                            foreach ($notes as $note) {
                                echo "<tr>";
                                echo "<td>";
                                echo $note["note"];
                                echo "</td>";
                                echo "<td>";
                                echo $note["commentaire"];
                                echo "</td>";
                                echo "</tr>";
                            }
?>
                    </table>
                </li>
                <li class="col3">
                    <h3>Noter</h3>
                    <p>
                                <!-- je fais un formulaire ici pour insérer la note dans une liste pour les numéro
                                action -> nom du script auquel sera soumis le formulaire.  -->
		
                        <form action="insertcomment.php" method="get">
                            <label for="note">Note (entre 0 et 20) : </label>
           					 <!-- Pour afficher la note et le commentaire -->
                            <input type="text" value="<?php echo $idLivre; ?>" style="display: none" name="id"/>
                                    <!-- min et max pour limiter la note-->
                            <input type="number" min="0" max="20"  name="note"/><br>
                            <label for="comment">Commentaire : </label>
                             <textarea name="comment"></textarea><br>
                            <input type="submit"/>
                        </form>
                    </p>
                </li>
                         </ul>

            </div>
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
