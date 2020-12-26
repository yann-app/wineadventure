<?php

require_once (__DIR__ . '/../config/database.php');
require_once (__DIR__ . '/../includes/header.php');


$articles = $pdo->query('SELECT titre, texte, photo FROM blog ORDER BY idblog DESC');

if (isset($_GET['search']) AND !empty($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);

    $articles = $pdo->query('SELECT titre, texte, photo FROM blog WHERE titre LIKE "%'.$search.'%" ORDER BY idblog DESC');
}

?>

<div class="col-md-6 mt-5 pt-5">
<form method="get">
    <input type="search" name="search" placeholder="Recherche...">
    <input type="submit" value="Valider">
</form>

<ul>

    <?php while ($a = $articles->fetch()) { ?>
        <li><?= $a['titre'] ?></li>
        <li><?= $a['texte'] ?></li>
        <li><?php echo '<img src ="../assets/images/'.$a['photo'].'" width = "200" height = "200"/>'; ?></li>
        <?php } ?>
</ul>

</div>
