<?php

include "./model/Rdv.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();

$rdv = new Rdv();
$rdv->getRdv($bdd);
?>
<a href="./?view=ajoutRendezVous">Ajout de rendez vous </a><br>
<a href="./">Index</a><br>