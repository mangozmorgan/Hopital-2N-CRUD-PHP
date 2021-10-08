<?php
include "./model/Patient.php";
include "./model/Rdv.php";
include "./model/Connection.php";


$bdd =  BddConnect::connect();


if(isset($_POST['lastName'])){


    $patient1 = new Patient();
    $patient1 -> insertClient($bdd,$_POST['lastName'],$_POST['firstName'],$_POST['birthDate'],$_POST['phone'],$_POST['mail']);

}elseif (isset($_POST['lastNameUpdate'])) {

    $patient1 = new Patient();
    $patient1 -> updatePatient($bdd,$_POST['id'],$_POST['lastNameUpdate'],$_POST['firstNameUpdate'],$_POST['birthDateUpdate'],$_POST['phoneUpdate'],$_POST['mailUpdate']);
    
}elseif (isset($_POST['dateRdv'])) {
   

    $rdv = new Rdv();
    $rdv ->addRdv($bdd,$_POST["dateRdv"].",".$_POST["timeRdv"],(int)$_POST["idSearch"]);
    
}elseif(isset($_POST['dateUp'])){
    $rdv = new Rdv();
    $rdv -> modifyRdv($bdd,$_POST["dateUp"].",".$_POST["timeUp"],$_POST["idPatientUp"],$_POST['id']);
}elseif (isset($_POST["idSearch"])) {
    $search = new Patient();
    $search->getOnePatient($bdd,$_POST["idSearch"]);
   
}



?>


<a href="./">Retour a l'index</a>