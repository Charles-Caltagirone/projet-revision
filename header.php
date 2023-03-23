            <?php
            if (isset($_SESSION['user'])) {
                echo '<a href="profil.php">Profil</a>';
                echo '<a href="article.php">Article</a>';
                echo '<a href="articles.php">Articles</a>';
                echo '<a href="deco.php">Déconnexion</a>';
            } else {
                echo '<a href="connexion.php">Connexion</a>';
                echo '<a href="inscription.php">Inscription</a>';
            }
            ?>