<?php
           
           include "./model/Patient.php";
           include "./model/Connection.php";

            $bdd =  BddConnect::connect();         
           
           $gentilClient = new Patient();
          
           $gentilClient -> getAllId($bdd);
           
           $cleanArray= [];
           
?>

<form class='userCard searchPatient ' action="./" method="get">
    <h2>Rechercher un patient</h2>
        <input class='hide' type="text" name="view" value='profilPatient'>
    
       <select name="id" > 
          <?php  
            
            foreach($_SESSION['arrayId'] as $arr){ ?>
                
                <option value="<?= $arr['id']?>"><?=   $arr['firstname']." : ".$arr['lastname'];   ?></option>           

           <?php  }  ?>      
        </select>
    
    <input type="submit" value="Rechercher">
</form>

<h2>Tout les patients</h2>
<div class="patientProfile">
    <?php $gentilClient -> getAllClients($bdd,$_GET['page']); ?>

</div>
<div class="pagesDiv">
     <?php foreach($_SESSION['pagesArray'] as $link){
         echo $link;
     }   
     ?>        




</div>
<a href="./?view=ajoutPatient">Ajout de patients </a><br>

<a href="./">Index</a><br>





