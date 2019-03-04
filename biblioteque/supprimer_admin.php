<?php

require_once 'c_login.php';

$id=$_GET['id'];

login::supprimer($id);

header ('location:liste_admin.php');