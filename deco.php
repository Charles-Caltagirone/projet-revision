<?php
require('user.php');

            $connUser = new User('','','','','','');
            $connUser->disconnect();
            header('Location:connexion.php');
