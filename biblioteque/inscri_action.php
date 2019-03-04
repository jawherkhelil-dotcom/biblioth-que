<?php

require_once 'c_inscri.php';

$cin=$_POST['cin'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$mdp=$_POST['mdp'];

if($cin=="" || $nom=="" || $prenom=="" || $login=="" || $mdp==""){
header('location:erreur_inscri.php');    
}
else{
$x=new client($cin, $nom, $prenom, $login, $mdp);
$x->ajouter();

header('location:login.php');
}