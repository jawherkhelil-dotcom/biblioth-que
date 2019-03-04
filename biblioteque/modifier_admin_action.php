<?php
require_once './c_login.php';

$id= $_POST['id'];
$login = $_POST['login'];
$mdp = $_POST['mdp'];

if($login=="" || $mdp==""){
echo '<center><h3 style="color:red"> --> Merci de remplir toute les champs <-- </h3></center>';
include("liste_admin.php");    
}
else{
$obj = new login($login, $mdp);
$obj->modifier($id);
header('location: liste_admin.php');
}