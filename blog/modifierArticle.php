<?php

require_once (__DIR__ . '/../config/database.php');
require_once (__DIR__ . '/../includes/header.php');

if (isset($_POST['photo'])) {

    $data = [
        'photo' => $_POST['photo'],
        'idblog' => $_GET['idblog'],
    ];
    $sql = "UPDATE blog SET photo=:photo WHERE idblog=:idblog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("location:/admin/adminPage.php");

}


if ($_POST) {

    $data = [
        'titre' => $_POST['titre'],
        'texte' => $_POST['texte'],
        'idblog' => $_GET['idblog'],
    ];
    $sql = "UPDATE blog SET titre=:titre, texte=:texte WHERE idblog=:idblog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("location:/admin/adminPage.php");
}


if ($_GET) {
    $stmt = $pdo->query("SELECT * FROM blog WHERE idblog=" . $_GET['idblog']);
}
?>

<div class="col-md-8 mx-auto pt-5 mt-5">
    <h2>Modifier article</h2>
        <form method="post" action="">
            <div class="form-group">

        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

                <textarea class="form-control" name="titre" rows="1"><?php echo ($row['titre']); ?></textarea>
                <textarea class="form-control" name="texte" rows="5"><?php echo ($row['texte']); ?></textarea>

            </div>
                <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    <h2>Modifier photo</h2>
    <form method="post" action="">
        <div class="form-group">
        <?php echo '<img src ="/assets/images/'.$row['photo'].'" width = "200" height = "200"/>'; ?>
        <input type="file" class="form-control" name="photo" value="photo">
        </div>
        <button type="submit" class="btn btn-primary" value="photo">Valider</button>
        <?php endwhile; ?>
    </form>
</div>

