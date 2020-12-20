<?php

error_reporting(E_ALL);

require_once (__DIR__ . '/../config/database.php');

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$text = isset($_POST["text"]) ? $_POST["text"] : "";


if (isset($_POST)){
    if ($id){
        $sql = "UPDATE articles SET text=:text WHERE id = " . $_POST['id'];

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':text', $text);

            $text = $_POST['text'];

            $retour = $stmt->execute();
        }catch (Exception $e){
            echo "Erreur !" .$e->getMessage();
        }
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  href="/assets/css/style.css">
    <link rel="stylesheet"  href="/assets/css/bootstrap.min.css">


    <title>Wineadventure</title>
</head>
<body>

<?php if (isset($_SESSION['user_id'])) { ?>
<a href="logout.php" class="btn btn-primary">Deconnexion</a>

<div class="col-md-2 mx-auto mt-5">
    <h2>Modifier texte</h2>
    <form method="post" action="">
        <div class="form-group">
            <select class="form-control " name="id">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <label for="text">Texte</label>
            <textarea class="form-control" name="text" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

    <div class="col-md-2 mx-auto mt-5">

        <h2>Ajouter article blog</h2>
        <form method="post" action="/blog/ajoutarticle.php">
            <div class="form-group">

                <textarea class="form-control" name="titre" rows="1">Titre</textarea>

                <textarea class="form-control" name="texte" rows="5">Texte</textarea>

                <input type="file" class="form-control" name="photo">
            </div>
            <button type="submit" class="btn btn-primary" value="blog">Valider</button>
        </form>
    </div>

    <?php
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
<table class="table">
    <thead>
    <tr>
        <th>Blog</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['idblog']); ?></td>
            <td><?php echo htmlspecialchars($row['titre']); ?></td>
            <td><?php echo htmlspecialchars($row['texte']); ?></td>
            <td><?php echo '<img src ="/assets/images/'.$row['photo'].'" width = "200" height = "200"/>'; ?></td>
            <td><a href="/blog/modifierArticle.php?idblog= <?php echo ($row['idblog']); ?>">Modifier</a> </td>
            <td><a href="/blog/supprimerArticle.php?idblog= <?php echo ($row['idblog']); ?>">Supprimer</a> </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>

<?php } else {?>

<a href="../admin.php" class="btn btn-primary">Connexion</a>

<?php }?>

</body>
</html>



