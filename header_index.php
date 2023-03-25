<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="./memory/css/style.css">
</head>
<body>
</body>
</html>
<img src="./memory/css/style.css" alt="">
<?php
            if (isset($_SESSION['user'])) {
                echo '<a href="index.php">Accueil</a>';
                echo '<a href="./memory/php/profil.php">Profil</a>';
                echo '<a href="./memory/php/article.php">Nouvel article</a>';
                echo '<a href="./memory/php/articles.php">Articles recensés</a>';
                echo '<a href="./memory/php/jeu.php">Memory game</a>';
                echo '<a href="./memory/php/deco.php">Déconnexion</a>';
            } else {
                echo '<a href="index.php">Accueil</a>';
                echo '<a href="./memory/php/connexion.php">Connexion</a>';
                echo '<a href="./memory/php/inscription.php">Inscription</a>';
            }
            ?>