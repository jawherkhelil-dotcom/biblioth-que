<?php

require_once 'c_login.php';

$login=$_POST['login'];
$mdp=$_POST['mdp'];

if($login=="" || $mdp==""){
echo '<center><h3 style="color:red"> --> Merci de remplir toute les champs <-- </h3></center>';
include("index_admin.php");
}
else{
$x=new login($login, $mdp);
$x->ajouter();

echo '<center><h3 style="color:green"> --> Ajout admin réussi! <-- </h3></center>';
include("index_admin.php");
}