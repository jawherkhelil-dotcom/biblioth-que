<?php

require_once 'c_inscri.php';

$login=$_POST['login'];
$mdp=$_POST['mdp'];

$x=new client("","","",$login, $mdp);
$x->verif();