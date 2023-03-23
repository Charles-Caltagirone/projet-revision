<?php
session_start();
require('config.php');

class User
{
    public $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;

    function getLogin()
    {
        return $this->login;
    }
    function setLogin($login)
    {
        $this->login = $login;
    }

    function getpassword()
    {
        return $this->password;
    }
    function setpassword($password)
    {
        $this->password = $password;
    }

    function getemail()
    {
        return $this->email;
    }
    function setemail($email)
    {
        $this->email = $email;
    }

    function getfirstname()
    {
        return $this->firstname;
    }
    function setfirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    function getlastname()
    {
        return $this->lastname;
    }
    function setlastname($lastname)
    {
        $this->lastname = $lastname;
    }

    function __construct($id, $login, $password, $email, $firstname, $lastname)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    function register($bdd)
    {
        $recupUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login=?");
        $recupUser->execute([$this->login]);
        $newUser = $bdd->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");

        if ($this->login == null) {
            echo 'remplir le login svp';
        } elseif ($this->password == null) {
            echo 'remplir le password svp';
        } elseif ($this->email == null) {
            echo "remplir l'email svp";
        } elseif ($this->firstname == null) {
            echo 'remplir le firstname svp';
        } elseif ($this->lastname == null) {
            echo 'remplir le lastname svp';
        } elseif ($_POST['confirmPassword'] == null) {
            echo 'remplir le confirmPassword svp';
        } elseif ($_POST['confirmPassword'] == null) {
            echo 'remplir le confirmPassword svp';
        } elseif ($recupUser->rowCount() > 0) {
            echo 'login déjà pris';
        } elseif ($this->password != $_POST['confirmPassword']) {
            echo 'MDP ne correspondent pas';
        } else {
            $newUser->execute([$this->login, $this->password, $this->email, $this->firstname, $this->lastname]);
        }
    }

    function update($bdd)
    {
        $recupUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login=?");
        $recupUser->execute([$this->login]);

        $newUser = $bdd->prepare("UPDATE utilisateurs SET login=?,password=?,email=?,firstname=?,lastname=? WHERE id=?");
        $newUser->execute([$this->login, $this->password, $this->email, $this->firstname, $this->lastname, $this->id]);

        $_SESSION['user']->login = $this->login;
        $_SESSION['user']->password = $this->password;
        $_SESSION['user']->email = $this->email;
        $_SESSION['user']->firstname = $this->firstname;
        $_SESSION['user']->lastname = $this->lastname;
        header('Location:#');
    }
    function connect($bdd)
    {
        $connUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $connUser->execute([$this->login, $this->password]);
        // $_SESSION['user'] = $connUser->fetchObject();
        $result = $connUser->fetch(PDO::FETCH_ASSOC);

        if ($result != false) {
            $this->id = $result['id'];
            $this->login = $result['login'];
            $this->password = $result['password'];
            $this->email = $result['email'];
            $this->firstname = $result['firstname'];
            $this->lastname = $result['lastname'];

            $_SESSION['user'] = $this;
            header('Location:connexion.php');
        }

        // var_dump($result);


        if ($this->login == null) {
            echo 'remplir le login svp<br>';
        } elseif ($this->password == null) {
            echo 'remplir le password svp<br>';
        } else {
            $connUser->execute([$this->login, $this->password]);
            $_SESSION['user'] = $connUser->fetch(PDO::FETCH_ASSOC);
        }
    }
    function disconnect()
    {
        unset($_SESSION['user']);
    }
    function isConnected()
    {
        if (isset($_SESSION['user'])) {
            echo 'connecté';
            return true;
        } else {
            echo 'disconnect';
            return false;
        }
    }
}


// $test = new User('login2', 'password2', 'email2', 'firstname2', 'lastname2');
// $test->register();
// $test->connect('login2', 'password2');
// $test->isConnected();
// $test->disconnect();
// var_dump($test);
