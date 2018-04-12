<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<?php
require_once 'InsertFunctions.php';
$idLivre = $_GET["id"];
if (isset($_GET["note"]) && isset($_GET["comment"]))
    insert_note($_GET["note"], $_GET["comment"], $idLivre);
$book = searchBookByID($idLivre);
$notes = searchNotes($idLivre);
?>
</html>
<!--en haut déja expliqué ici je fais une redirection vers la page détails.php-->
<meta http-equiv="refresh" content="0; url=details.php?id=<?php echo $idLivre ?>" />