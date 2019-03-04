<?php
require_once './livre.php';

$id= $_POST['id'];
$nom = $_POST['nom'];
$auteur = $_POST['auteur'];

if($nom=="" || $auteur==""){
echo '<center><h3 style="color:red"> --> Merci de remplir toute les champs <-- </h3></center>';
include("index_admin.php");    
}
else{
    livre::modifier($nom, $auteur, $id);
header('location: index_admin.php');
}