<?php

require_once 'c_login.php';

$login=$_POST['login'];
$mdp=$_POST['mdp'];

$x=new login($login, $mdp);
$x->verif();