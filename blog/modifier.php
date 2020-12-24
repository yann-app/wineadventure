<?php

require_once (__DIR__ . '/../config/database.php');

if (isset($_POST['modifierArticle'])) {

    $data = [
        'titre' => $_POST['titre'],
        'texte' => $_POST['texte'],
    ];

    $sql = "UPDATE blog SET titre=:titre, texte=:texte WHERE idblog=" . $_GET['idblog'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("location:/admin/adminPage.php");

}

if (isset($_POST['modifierPhoto'])) {

    $data = [
        'photo' => $_POST['photo'],
    ];

    $sql = "UPDATE blog SET photo=:photo WHERE idblog=" . $_GET['idblog'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("location:/admin/adminPage.php");

}


if ($_GET) {
    $stmt = $pdo->query("SELECT * FROM blog WHERE idblog=" . $_GET['idblog']);
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


    <title>Modifier</title>
</head>
<body>

<div class="col-md-8 bg-secondary mx-auto pt-5 mt-5">
    <a href="/admin/adminPage.php" class="btn btn-primary">Retour</a>
    <h2 class="pl-1">Modifier article</h2>
        <form method="post" action="">
            <div class="form-group">

        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

                <textarea class="form-control" name="titre" rows="1"><?php echo ($row['titre']); ?></textarea>
                <textarea class="form-control mt-2" name="texte" rows="5"><?php echo ($row['texte']); ?></textarea>

            </div>
                <button type="submit" class="btn btn-primary" name="modifierArticle">Valider</button>
        </form>
    <h2 class="pl-1">Modifier photo</h2>
    <form method="post" action="">
        <div class="form-group">
        <?php echo '<img src ="/assets/images/'.$row['photo'].'" width = "200" height = "200"/>'; ?>
        <input type="file" class="form-control mt-2" name="photo">
        </div>
        <button type="submit" class="btn btn-primary" name="modifierPhoto">Valider</button>
        <?php endwhile; ?>
    </form>
</div>

</body>

</html>