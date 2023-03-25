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
    <div class="game">
        <?php
        // if (isset($_POST['submitLevel'])) {
        //     $_SESSION['choiceLevel'] = intval($_POST['level']);
        //     // $_SESSION['choiceLevel'] = $_POST['level'];
        //     $nbCard = $_SESSION['choiceLevel'];
        // }

        // var_dump($nbCard);
        
        $nbCard = 6;
        game($nbCard);

        ?>
    </div>
    <?php
    // on crÃ©e la boucle qui affichera les cartes
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
                    // fonction native 'array_push, on choisie la variable ciblÃ©e, et on y insÃ¨re l'Ã©lÃ©ment souhaitÃ©
                    array_push($_SESSION['count'], $newCard[$i]);
                    // var_dump($newCard[$i]);
                }
            } else {
                // var_dump("on passe par lÃ ");
                if ($_SESSION['count'][0]->getImg_face_up() == $_SESSION['count'][1]->getImg_face_up()) {
                    if (isset($_SESSION['returned'])) {
                        $_SESSION['count'][0]->setState(true);
                        $_SESSION['count'][1]->setState(true);
                        array_push($_SESSION['returned'], $_SESSION['count']);
                        endGame();
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
                $newCard[$i]->setState(true);
                header('location:test.php');
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
                // afficher les cartes (par dÃ©faut, leur Ã©tat est FALSE)
                compareCard($random, $i);
                if ($random[$i]->getState() == false) {
            ?>
                    <button type="submit" name="click" value="<?= $random[$i]->getId_card() ?>">
                        <img src="<?= $random[$i]->getImg_face_down() ?>" alt="" height="200px" width="150px"></button>
                <?php
                    // et quand on cliquera, l'Ã©tat passera en TRUE et le ELSE s'applique
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
        if (count($_SESSION['plateau']) == (count($_SESSION['returned']) * 3)) {
            echo 'BIEN jouÃ© !';
        }
    }
    ?>
    <br>
    <?php
    // var_dump($_SESSION['returned']);

    if (isset($_GET['reset'])) {
        session_destroy();
        session_unset();
        // unset($_GET);
        header('Location:test.php');
    }
    ?>
    <div class="reset">
        <form action="" method="get">
            <button type="submit" name="reset">Reset</button>
        </form>
        <form action="" method="post">
            <select name="level" id="">
                <option value="6">3 paires</option>
                <option value="12">6 paires</option>
                <option value="24">12 paires</option>
            </select>
            <input type="submit" name="submitLevel" id="" value="Lancer la partie">
        </form>
    </div>
    <style>
        .game {
            display: flex;
        }
    </style>
</body>
<?php
// var_dump($_SESSION);
// var_dump($_SESSION['plateau']);
// var_dump(count($_SESSION['returned']));
// var_dump(count($_SESSION['plateau']));
// var_dump($_SESSION['returned']);
?>

</html>