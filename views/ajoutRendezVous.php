<?php

include "./model/Patient.php";
include "./model/Connection.php";

$bdd =  BddConnect::connect();
$gentilClient = new Patient();
          
           $gentilClient -> getAllId($bdd);
?>

<form action="traitement.php" method="post">
    <h3>Ajouter rendez vous </h3>
    <label for="dateRdv">Date du rendez vous</label>
    <input type="date" name="dateRdv" id="dateRdv">
    <label for="timeRdv">Heure</label>
    <input type="time" name="timeRdv" id="timeRdv">
    <label for="idPatient"> Patient</label>
    <select name="idSearch" > 
          <?php  
            
            foreach($_SESSION['arrayId'] as $arr){ ?>
                
                <option value="<?= $arr['id']?>"><?=   $arr['lastname']." : ".$arr['firstname'];   ?></option>           
               
           <?php  }  ?>          
    </select>
    <input type="submit" value="Ajouter le rendez vous ">
</form>

<div class="containLink">
    <a href="./">Index</a><br>
    <a href="./?view=listeRendezVous">Liste des rendez vous </a><br>
</div>