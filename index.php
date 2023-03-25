<?php
require('./memory/php/user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
        <header>
        <nav>
            <?php require('./header_index.php');
            ?>
        </nav>
    </header>
    <main>
        <div class="accueil">
        <h1>Bienvenue !</h1>
    </div> 
    <div class="description">       
    <p>Venez découvrir nos articles et notre jeu Memory</p>
    </div>
    </main>
</body>
</html>