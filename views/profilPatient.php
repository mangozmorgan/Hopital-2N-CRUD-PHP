<?php
include "./model/Patient.php";


include "./model/Rdv.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();
$patient = new Patient();


$displayOwnRdv = new Rdv();


?>
<div class="contain2">

    <div class="userCard">
    <?php $patient->getOnePatient($bdd,$_GET["id"]); ?>
    <div class="userCard">
        <?php $displayOwnRdv ->selectOwnRdv($bdd,$_GET["id"]);?>
    </div>
    </div>
    
    
    <form class='mdfPatient userCard' action='./traitement.php' method='post'>
        <h2>Modifier patient</h2>
        <label class="hide" for='id'>LastName</label>
        <input class="hide" type='text' name='id' value='<?= $_SESSION['id']?>' id='lastNameUpdate'>
        <label for='lastNameUpdate'>LastName</label>
        <input type='text' name='lastNameUpdate' value='<?= $_SESSION['lastName']?>' id='lastNameUpdate'>
        <label for='firstNameUpdate'>firstName</label>
        <input type='text' value='<?= $_SESSION['firstName']?>' name='firstNameUpdate' id='firstNameUpdate'>
        <label for='birthDateUpdate'>birthDate</label>
        <input type='text' value='<?= $_SESSION['birthDate']?>' name='birthDateUpdate' id='birthDateUpdate'>
        <label for='phoneUpdate'>phone</label>
        <input type='text' value='<?= $_SESSION['phone']?>' name='phoneUpdate' id='phoneUpdate'>    
        <label for='mailUpdate'>mail</label>
        <input type='mail' value='<?= $_SESSION['mail']?>' name='mailUpdate' id='mailUpdate'>
        <input type='submit' value='Envoyer'>
    
    </form>
</div>

<a href="./">Index</a><br>


