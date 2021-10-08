<?php


include "./model/Rdv.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();

$removeRdv = new Rdv();
$removeRdv->removeRdv($bdd,$_GET['id']);