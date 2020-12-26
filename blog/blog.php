<?php

require_once (__DIR__ . '/../config/database.php');
require_once (__DIR__ . '/../includes/header.php');


try{
    $sql = "SELECT * FROM blog";
    $stmt = $pdo->query($sql);

    if($stmt === false){
        die("Erreur");
    }

}catch (PDOException $e){
    echo $e->getMessage();
}
?>

<div class="col-md-8 mx-auto pt-5 mt-5">
    <form method="get" action="/includes/search.php">

        <input type="search" name="search" placeholder="Recherche...">
        <input type="submit" value="Valider">
    </form>
<table class="table">
    <thead>
    <tr>
        <th>Blog</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['titre']); ?></td>
            <td><?php echo htmlspecialchars($row['texte']); ?></td>
            <td><?php echo '<img src ="/assets/images/'.$row['photo'].'" width = "200" height = "200"/>'; ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>





