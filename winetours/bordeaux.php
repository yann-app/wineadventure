<?php

require_once (__DIR__ . '/../config/database.php');
require_once (__DIR__ . '/../includes/header.php');

$reponse = $pdo->query('SELECT * FROM articles');

while ($donnees = $reponse->fetch())

{
?>

<div class="container-bor d-flex h-100">
    <div class="row align-self-center w-100">
        <div class="col-6 mx-auto">
            <div class="jumbotron bg-transparent">
                <h1 class="display-4 text-white text-center">Bordeaux</h1>

                <?php

                require_once (__DIR__ .'/../includes/jumbotron.php');

                ?>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Lorem Ipsum</h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <p>
                <?php echo $donnees['text']; ?>
            </p>
            <?php
            }
            $reponse->closeCursor();
            ?>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron-blois h-100 text-center">
                <div class="button">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Beaujolais</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron-chen h-100 text-center">
                <div class="button">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Beaujolais</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron-blois h-100 text-center">
                <div class="button">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Beaujolais</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron-chen h-100 text-center">
                <div class="button">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Beaujolais</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-bottom d-flex">
    <div class="row-footer w-100">
        <footer>

        </footer>
    </div>
</div>


</body>
</html>
