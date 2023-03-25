<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
</body>
</html>
<img src="../../index.php" alt="">
<?php
            if (isset($_SESSION['user'])) {
                echo '<a href="../../index.php">Accueil</a>';
                echo '<a href="profil.php">Profil</a>';
                echo '<a href="article.php">Nouvel article</a>';
                echo '<a href="articles.php">Articles recensés</a>';
                echo '<a href="jeu.php">Memory game</a>';
                echo '<a href="deco.php">Déconnexion</a>';
            } else {
                echo '<a href="../../index.php">Accueil</a>';
                echo '<a href="connexion.php">Connexion</a>';
                echo '<a href="inscription.php">Inscription</a>';
            }
            ?>