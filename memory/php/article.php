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
        <div class="newArticle">
        <form action="" method="POST">
            <textarea type="text" name="article" placeholder="article" cols="50" rows="5" autofocus></textarea><br><br>
            <?php
            // $cat = (ressortir le nom des cat: créer fonction avec requete pour recup infos des cat);      
            ?>
            <legend><b>Catégorie(s)</b></legend>
            <div class="choiceCat">
            <input type="checkbox" name="cat[]" value="1" />Sport<br />
            <input type="checkbox" name="cat[]" value="2" />Bien-être<br />
            <input type="checkbox" name="cat[]" value="3" />Immobilier<br />
            <input type="checkbox" name="cat[]" value="4" />Fais divers<br /><br />
            <input type="submit" name="submit" id="">
            </div>
        </form>
        </div>
        <div class="verif">
        <?php
        if (isset($_POST['submit'])) {
            if($_POST['article'] == null){
                echo "⚠ Ecrivez quelque chose ⚠";
                }elseif(!isset($_POST['cat'])){
                echo "⚠ Choisissez au moins une catégorie svp ⚠";
                }else{    
            $newArticle = new Article($_POST['article'], $_SESSION['user']['id'], $_POST['cat']);
            // var_dump($_POST['cat']);
            $newArticle->register($bdd);   
            // $newArticle->allInfosSession($bdd);
        }}
        // $password = $_POST['password'];
        // $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // $passwordverif = password_verify()
        ?>
        </div>
    </main>
</body>

</html>