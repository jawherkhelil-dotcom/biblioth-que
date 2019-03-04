<?php

require_once 'reserve.php';
require_once 'paniet.php';

$id_livre1=$_GET['id_livre1'];
$id_livre2=$_GET['id_livre2'];
$id_util=$_GET['id_util'];

$x=new reserve($id_util, $id_livre1, $id_livre2);
$x->ajouter();
paniet::supprimer_tous();
header ('location:index_util.php?ii='.$id_util.'');