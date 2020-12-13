<?php

require_once (__DIR__ . '/config/database.php');

if ($_POST) {

    $stm = $pdo->query("SELECT id, password FROM admin WHERE username='" . $_POST['username'] . "'");
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if ($_POST['password'] == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location:../admin/adminPage.php");
        exit();
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
<div class="col-md-2 mx-auto mt-5">
<form method="post" action="">
    <div class="form-group">
        <label for="exampleInputEmail1">Utilisateur</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>
</div>