<?php
require('user.php');
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
        <div class="profil">
        <form action="" method="POST">
            <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>"><br><br>
            <input type="text" name="password" value="<?= $_SESSION['user']['password'] ?>"><br><br>
            <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>"><br><br>
            <input type="text" name="firstname" value="<?= $_SESSION['user']['firstname'] ?>"><br><br>
            <input type="text" name="lastname" value="<?= $_SESSION['user']['lastname'] ?>"><br><br>
            <input type="submit" name="submit" value="Modifier" id="">
        </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $regUser = new User($_SESSION['user']->id, $_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
            $regUser->update($bdd);
        }
        ?>
    </main>
</body>
<?php
// var_dump($_SESSION['user']);
?>

</html>