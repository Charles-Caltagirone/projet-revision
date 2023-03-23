<?php
require('class_article.php');
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <?php require('header.php');
            ?>
        </nav>
    </header>

    <main>
        <form action="" method="POST">
            <textarea type="text" name="article" placeholder="article" cols="50" rows="5" autofocus></textarea><br><br>
            <legend><b>Catégorie(s)</b></legend>
            <?php
            // $cat = (ressortir le nom des cat: créer fonction avec requete pour recup infos des cat);

           
            ?>
            <input type="checkbox" name="cat[]" value="1" />Sport<br />
            <input type="checkbox" name="cat[]" value="2" />Bien-être<br />
            <input type="checkbox" name="cat[]" value="3" />Immobilier<br />
            <input type="checkbox" name="cat[]" value="4" />Fais divers<br /><br />
            <input type="submit" name="submit" id="">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $newArticle = new Article($_POST['article'], $_SESSION['user']['id'], $_POST['cat']);
            var_dump($_POST['cat']);
            $newArticle->register($bdd);                
            // $newArticle->allInfosSession($bdd);
        }
        // $password = $_POST['password'];
        // $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // $passwordverif = password_verify()
        ?>
    </main>
</body>

</html>