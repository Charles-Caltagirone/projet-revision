<?php
require_once('function.php');
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">

    <title>Document</title>
</head>

<body>
    <?php require_once('header.php') ?>
    <div>
        <?php
        if (empty($_SESSION['trueCard'])) {
            $_SESSION['trueCard'] = [];
        }

        function resetGame()
        {
            if (!empty($_GET['reset']) && $_GET['reset'] == 'reset') {
                unset($_SESSION['plateau']);
                unset($_SESSION['click']);
                unset($_SESSION['trueCard']);
                // session_destroy();
                // header('refresh: 0');
                header('Location:jeux.php');
            }
        }
        // ---------------------------------------------------------------------------------
        function createCard($nbCard)
        {
            for ($i = 0; $i < ($nbCard * 2); $i += 2) {
                $carteUp = 'img/' . $i . '.png';
                $carteDown = 'img/back.png';
                $card[$i] = new Card($i, $carteUp, $carteDown, false);
                $card[$i + 1] = new Card($i + 1, $carteUp, $carteDown, false);
            }
            return $card;
        }
        // ---------------------------------------------------------------------------------
        function random($card)
        {
            if (empty($_SESSION['plateau'])) {
                shuffle($card);
                $_SESSION['plateau'] = $card;
            }
            return $_SESSION['plateau'];
        }
        // ---------------------------------------------------------------------------------
        function clickCard($randomCard)
        {
            if (!empty($_SESSION['click'])) {
                if (count($_SESSION['click']) < 2) {
                    array_push($_SESSION['click'], $randomCard);
                } else {
                    // $_SESSION['click'][0]->setState(false);
                    // $_SESSION['click'][1]->setState(false);
                    $_SESSION['click'] = [];
                    header('refresh: 0');
                }
            } else {
                $_SESSION['click'] = [];
                array_push($_SESSION['click'], $randomCard);
            }
        }
        // ---------------------------------------------------------------------------------
        function getClick($randomCard, $i)
        {
            if (isset($_GET['id'])) {
                if ($_GET['id'] == $randomCard[$i]->id_card) {
                    $randomCard[$i]->state = true;
                    clickCard($randomCard[$i]);
                }
            }
        }
        // ---------------------------------------------------------------------------------
        function returnCard($randomCard, $i)
        {
            if ($randomCard[$i]->state == false) { ?>

                <form>
                    <button type="submit" value="<?= $randomCard[$i]->getId_card() ?>" name="id">
                        <img src="<?= $randomCard[$i]->getImg_face_down() ?>" alt="" height="300px" width="200px">
                    </button>
                </form>

            <?php } else { ?>
                <img src="<?= $randomCard[$i]->getImg_face_up() ?>" alt="" height="300px" width="200px">
        <?php
            }
        }
        // ---------------------------------------------------------------------------------
        function checkCard()
        {

            if (!empty($_SESSION['click'])) {
                if (count($_SESSION['click']) == 2) {
                    if ($_SESSION['click'][0]->getImg_face_up() == $_SESSION['click'][1]->getImg_face_up()) {
                        if (isset($_SESSION['trueCard'])) {
                            $_SESSION['click'][0]->setState(true);
                            $_SESSION['click'][1]->setState(true);
                            array_push($_SESSION['trueCard'], $_SESSION['click']);
                        }
                    } else {
                        $_SESSION['click'][0]->setState(false);
                        $_SESSION['click'][1]->setState(false);
                    }
                }
            }
        }
        // ---------------------------------------------------------------------------------
        function endGame()
        {
            if (count($_SESSION['trueCard']) * 2 == count($_SESSION['plateau'])) {
                echo '<p class="end">FIN DE PARTIE</p>';
            }
        }
        // ---------------------------------------------------------------------------------
        function afficherCard($nbCard)
        {
            $card = createCard($nbCard);
            $randomCard = random($card);

            for ($i = 0; $i < count($randomCard); $i++) {
                getClick($randomCard, $i);
                returnCard($randomCard, $i);
            }
            checkCard();
            resetGame();
        }
        // ---------------------------------------------------------------------------------

        $nbCard = 3;
        afficherCard($nbCard);
        ?>
    </div>

    <?php endGame(); ?>

    <form action="" id="form">
        <button type="submit" name="reset" value="reset" id="reset">RESET</button>
    </form>

    <?php
    // var_dump($_SESSION);

    ?>
</body>
<style>
    div {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px 0;
    }

    img {
        object-fit: cover;
        object-position: top;
    }

    .end {
        /* margin-top: 20px; */
        padding: 10px 20px;
        color: #121a2e;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
    }

    #form {
        margin-top: 10px;
        text-align: center;
    }

    #reset {
        color: #f1b16a;
        padding: 5px;
        background-color: #121a2e;
    }

    #reset:active {
        background-color: #e74153;
    }
</style>

</html>