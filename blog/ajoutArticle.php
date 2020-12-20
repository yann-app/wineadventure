<?php

require_once (__DIR__ . '/../config/database.php');

$idblog = isset($_POST["idblog"]) ? $_POST["idblog"] : "";
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$texte = isset($_POST["texte"]) ? $_POST["texte"] : "";
$photo = isset($_POST["photo"]) ? $_POST["photo"] : "";

try {

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO blog (titre, texte, photo) VALUES (:titre, :texte, :photo)");

    $stmt->bindParam('titre', $titre);
    $stmt->bindParam('texte', $texte);
    $stmt->bindParam('photo', $photo);

    $titre = $_POST["titre"];
    $texte = $_POST["texte"];
    $photo = $_POST["photo"];
    $stmt->execute();

    header("location:../admin/adminPage.php");
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
}
$pdo = null;

?>