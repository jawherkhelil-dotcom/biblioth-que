<?php

require_once 'livre.php';

$nom=$_POST['nom'];
$auteur=$_POST['auteur'];

if($nom=="" || $auteur==""){
echo '<center><h3 style="color:red"> --> Merci de remplir toute les champs <-- </h3></center>';
include("index_admin.php");
}
else{
$x=new livre($nom, $auteur);
$x->ajouter();

echo '<center><h3 style="color:green"> --> Ajout livre réussi! <-- </h3></center>';
include("index_admin.php");
}