<?php

require_once 'livre.php';

$id=$_GET['id'];

livre::supprimer($id);

header ('location:index_admin.php');