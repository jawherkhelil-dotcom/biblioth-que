<?php

require_once 'reserve.php';

$id=$_GET['id'];
$ii=$_GET['ii'];

reserve::supprimer($id);

header ('location:liste_reserve.php?id='.$ii.'');