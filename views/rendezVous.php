<?php

include "./model/Rdv.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();

$listRdv = new Rdv();
$listRdv->selectOne($bdd,$_GET["id"]);

?>

<form class='userCard searchPatient' action='./traitement.php' method='post'>
    <h2>Modifier le Rendez vous</h2>
    <label class="hide" for='id'></label>
    <input class="hide" type='text' name='id' value='<?= $_SESSION['id']?>'>
    <label for='dateUp'>Date</label>
    <input type='date' name='dateUp' value='<?= $_SESSION['date']?>' id='dateUp'>
    <label for='timeUp'>Heure</label>
    <input type='time' value='<?= $_SESSION['heure']?>' name='timeUp' >
    <label class='hide' for='idPatientUp '>Id Patient</label>
    <input type='text' class='hide' value='<?= $_SESSION['idPatient']?>' name='idPatientUp'>
   
    <input type='submit' value='Envoyer'>

</form>


<a href="./">Retour a l'index</a>