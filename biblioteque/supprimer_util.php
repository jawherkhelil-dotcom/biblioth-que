<?php

require_once 'c_inscri.php';

$id=$_GET['id'];

client::supprimer($id);

header ('location:liste_util.php');