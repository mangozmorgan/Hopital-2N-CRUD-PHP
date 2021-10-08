<?php


include "./model/Rdv.php";
include "./model/Patient.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();

$removePatient = new Patient();
$removePatient->removePatient($bdd,$_GET['id']);

$removeHisRdv = new Rdv();
$removeHisRdv->removeRdv($bdd,$_GET['id']);
