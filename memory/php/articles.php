<?php
require('class_article.php');
$tableauArticles = new Article('', '', '');
$array = $tableauArticles->allArticlesLogin($bdd);
// var_dump($array);

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
        <div class="ordre">
            <form action="" method="GET">
                <input type="submit" value="<?= $array[1] ?>" name="order" id="">
            </form>
        </div>
<div class="articles">
        <table class="" border="1">
            <tr>
                <th>Auteur</th>
                <th>Article</th>
                <th>Catégorie</th>
            </tr>
            <?php
            foreach ($array[0] as $key) {
                echo '<tr>';
                echo '<td>' . $key['login'] . '</td>';
                echo '<td>' . $key['article'] . '</td>';
                // categorie :
                // foreach() where articles.id
                echo '<td>' . $key['categorie'] . '</td>';
                echo '</tr>';
            }
            // var_dump($array[0]);
            ?>
        </table>
</div>
    </main>
</body>

</html>