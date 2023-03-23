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
        <form action="" method="POST">
            <input type="text" name="login" placeholder="login"><br><br>
            <input type="text" name="password" placeholder="password"><br><br>
            <input type="text" name="email" placeholder="email"><br><br>
            <input type="text" name="firstname" placeholder="firstname"><br><br>
            <input type="text" name="lastname" placeholder="lastname"><br><br>
            <input type="text" name="confirmPassword" placeholder="confirmPassword"><br><br>
            <input type="submit" name="submit" id="">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $regUser = new User('',$_POST['login'],$_POST['password'],$_POST['email'],$_POST['firstname'],$_POST['lastname']);
            $regUser->register($bdd);
        }
        var_dump($_SESSION);
        ?>
    </main>
</body>

</html>