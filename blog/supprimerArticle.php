<?php

require_once (__DIR__ . '/../config/database.php');

if ($_GET) {
    $rows = $pdo->exec("DELETE FROM blog WHERE idblog=" . $_GET['idblog']);

    if ($rows > 0) {
        header("location:/admin/adminPage.php");
    } else {
        echo'Error';
    }
}

?>