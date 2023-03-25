<?php
require('user.php');
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
    <div class="connexion">
                <form action="" method="POST">
            <input type="text" name="login" placeholder="login"><br><br>
            <input type="text" name="password" placeholder="password"><br><br>
            <input type="submit" name="submit" value="Connexion" onclick="Connecté">
            <input type="submit" name="disconnect" value="déco">
        </form>
    </div>
    <div class="verif">
        <?php
        if (isset($_POST['submit'])) {
            $connUser = new User('',$_POST['login'],$_POST['password'],'','','');
            $connUser->connect($bdd);
            $connUser->isConnected();
            header('Location:profil.php');
            // echo $connUser->getLogin();
            // echo $connUser->getpassword();
                    }

        if(isset($_POST['disconnect'])){
            // $connUser = new User($_POST['login'],$_POST['password'],'','','');
            // $connUser->disconnect();
            header('Location:deco.php');
        }

        // var_dump($_SESSION);
        ?>
</div>
    </main>
</body>

</html>