<?php
require('function.php');
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
            <?php require('./header.php');
            ?>
        </nav>
    </header>
    <main>
        <div class="level">
            <form action="" method="post">
                <select name="level" id="">
                    <option value="6">3 paires</option>
                    <option value="12">6 paires</option>
                    <option value="24">12 paires</option>
                </select>
                <input type="submit" name="submitLevel" id="" value="Lancer la partie">
            </form>
            <!-- </div> -->
        
            <!-- <div class="reset"> -->
                <form action="" method="get">
                    <button type="submit" name="reset">Reset</button>
                </form>
            </div>
    <div class="game">
        <?php
        if (isset($_POST['submitLevel'])) {
            $_SESSION['choiceLevel'] = intval($_POST['level']);
            // $_SESSION['choiceLevel'] = $_POST['level'];
            // $nbCard = $_SESSION['choiceLevel'];
            // var_dump('ON EST LA');
        }
        if (isset($_SESSION['choiceLevel'])) {
            game($_SESSION['choiceLevel']);
        }

        // var_dump($_SESSION['choiceLevel']);

        // $nbCard = 6;

        ?>
    </div>
    <?php
    $_SESSION['scoreMax']= '';
    
    $_SESSION['score']= '';

    // $_SESSION['msgFin'] = '';

    if (empty($_SESSION['returned'])) {
        $_SESSION['returned'] = [];
    }

    if (empty($_SESSION['nbClick'])) {
        $_SESSION['nbClick'] = 0;
    }

    if (empty($_SESSION['count'])) {
        $_SESSION['count'] = [];
    }
    if (empty($_SESSION['plateau'])) {
        $_SESSION['plateau'] = [];
    }
    // on crée la boucle qui affichera les cartes
    function createCard($nbCard)
    {
        if (empty($_SESSION['cartes'])) {
            for ($i = 0; $i < $nbCard; $i += 2) {
                $imgUp = '../img/' . $i . '.png';
                $imgDown = '../img/back.jpg';
                $newCard[$i] = new Card($i, $imgDown, $imgUp, false);
                $newCard[$i + 1] = new Card($i + 1, $imgDown, $imgUp, false);
            }
            $_SESSION['cartes'] = $newCard;
        }
        return $_SESSION['cartes'];
    }


    // var_dump($_SESSION['cartes']);

    function randomCard($newCard)
    {
        if (empty($_SESSION['plateau'])) {
            shuffle($newCard);
            $_SESSION['plateau'] = $newCard;
        }
        return $_SESSION['plateau'];
    }

    function compareCard($newCard, $i)
    {
        if (isset($_SESSION['count'])) {
            if (count($_SESSION['count']) < 2) {
                if (stateCard($newCard, $i) == true) {
                    // fonction native 'array_push, on choisie la variable ciblée, et on y insère l'élément souhaité
                    // var_dump('ON EST LAAA');
                    array_push($_SESSION['count'], $newCard[$i]); 
                }
            } elseif (count($_SESSION['count']) == 2) {
                // var_dump("on passe par là");
                if ($_SESSION['count'][0]->getImg_face_up() == $_SESSION['count'][1]->getImg_face_up()) {
                    if (isset($_SESSION['returned'])) {
                        $_SESSION['count'][0]->setState(true);
                        $_SESSION['count'][1]->setState(true);
                        array_push($_SESSION['returned'], $_SESSION['count']);
                        header('Location:jeu.php');
                    } else {
                        $_SESSION['returned'] = [];
                    }
                } else {
                    $_SESSION['count'][0]->setState(false);
                    $_SESSION['count'][1]->setState(false);
                }
                $_SESSION['count'] = [];
            }
        } else {
            $_SESSION['count'] = [];
        }
    }

    function stateCard($newCard, $i)
    {
        if (isset($_GET['click'])) {
            if ($_GET['click'] == $newCard[$i]->id_card) {
                $_SESSION['nbClick'] +=1;
                $newCard[$i]->setState(true);
                return true;
            }
        }
    }

    function game($nbCard)
    {
    ?>
        <form action="" method="GET">
            <?php
            $newCard = createCard($nbCard);
            // var_dump($newCard);
            $random = randomCard($newCard);

            for ($i = 0; $i < count($random); $i++) {
                // afficher les cartes (par défaut, leur état est FALSE)
                compareCard($random, $i);
                if ($random[$i]->getState() == false) {
            ?>
                    <button type="submit" name="click" value="<?= $random[$i]->getId_card() ?>">
                        <img src="<?= $random[$i]->getImg_face_down() ?>" alt="" height="200px" width="150px"></button>
                <?php
                    // et quand on cliquera, l'état passera en TRUE et le ELSE s'applique
                } else {
                ?>
                    <img src="<?= $random[$i]->getImg_face_up() ?>" alt="" height="200px" width="150px">
            <?php
                }
            }
            ?>
        </form>
    <?php
    }

    function endGame()
    {
 // quand toutes les cartes sont true


        if (count($_SESSION['plateau']) == count($_SESSION['returned']) * 2 && count($_SESSION['plateau']) != 0 && count($_SESSION['returned']) != 0) {
            $_SESSION['scoreMax']=(count($_SESSION['plateau']) * 4) - (count($_SESSION['plateau']));
            $_SESSION['score'] = (count($_SESSION['plateau']) * 4) - $_SESSION['nbClick']; //ma façon de calculer le score
            if($_SESSION['score'] >= (count($_SESSION['plateau']) * 4) - (count($_SESSION['plateau']))){
                echo "PERFECT !!! Tu gères ! Ton score : " .$_SESSION['score']. ".";
            }elseif($_SESSION['score'] >= (count($_SESSION['plateau']) * 4) - ($_SESSION['nbClick']/0.8)){
                echo "Plutôt pas mal ! Ton score : " .$_SESSION['score']. " (score max : ".$_SESSION['scoreMax'].")";
            }elseif($_SESSION['score'] >= (count($_SESSION['plateau']) * 4) - ($_SESSION['nbClick']/2)){
                echo "C'est bien mais peut mieux faire. Ton score : " .$_SESSION['score']. " (score max : ".$_SESSION['scoreMax'].")";
            }else{
                echo "T'es nul. Ton score : " .$_SESSION['score']. ". (score max : ";
            }
        } 
        // var_dump($_SESSION['scoreMax']);
    }
        ?>
    <br>
    <?php

    // var_dump($_SESSION['returned']);
    function resetGame()
    {
        if (isset($_GET['reset'])) {
            unset($_SESSION['scoreMax']);
            unset($_SESSION['score']);
            // unset($_SESSION['msgFin']);
            unset($_SESSION['returned']);
            unset($_SESSION['nbClick']);
            unset($_SESSION['count']);
            unset($_SESSION['plateau']);
            unset($_SESSION['cartes']);
            unset($_SESSION['choiceLevel']);
            // session_destroy();
            header('Location:jeu.php');
        }
    }
    ?>
<div class="verif">
    <?php
    endGame();
    ?>
    </div>
    <?php
    resetGame();
    // echo $_SESSION['msgFin'];
    ?>
</main>
</body>

<?php
// echo $_SESSION['nbClick'];
// var_dump($_SESSION['count']);
// var_dump($_SESSION['plateau']);
// var_dump(count($_SESSION['plateau']));
// var_dump(count($_SESSION['plateau']));
// var_dump(count($_SESSION['returned']));
// var_dump($_SESSION['nbClick']);
// var_dump($_SESSION);
?>
</html>