<?php

require_once 'reserve.php';

$id=$_GET['id'];

reserve::supprimer($id);

header ('location:index_admin.php');