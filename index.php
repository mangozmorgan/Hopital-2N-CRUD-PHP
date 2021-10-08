<?php

ob_start();

if(isset($_GET['view'])){
    $titre = 'Bienvenue';
    $page = $_GET["view"];
    switch ($page) {
        
        case 'ajoutPatient':
            $titre = 'Ajout de nouveaux patients';
            include_once "./views/ajoutPatient.php";           
            break;

        case 'listPatients':
            $titre = 'Liste des patients';
            include_once "./views/listPatients.php";         
            break;

        case 'ajoutRendezVous' :
            $titre = 'Ajouter un rendez-vous';
            include_once "./views/ajoutRendezVous.php";           
            break;

        case 'listeRendezVous' :
            $titre = 'Liste des rendez-vous';
            include_once "./views/listeRendezVous.php";          
            break;

        case 'profilPatient' :
            $titre = 'Profil patients';
            include_once "./views/profilPatient.php";          
            break;

        case 'rendezVous' :
            $titre = 'Rendez-vous';
            include_once "./views/rendezVous.php";          
            break;

        case 'deletePatient' :
            $titre = 'Supprimer un patient';
            include_once "./views/deletePatient.php";          
            break;

        case 'deleteRendezVous' :
            $titre = 'Supprimer un rendez-vous';
            include_once "./views/deleteRendezVous.php";          
            break;
        
        default:
            $titre = 'Bienvenue';
            include_once "./views/indexLink.php";            
            break;
    };

     $rendu = ob_get_clean();
     include_once './templates/template.php';

}else{
    include_once "./views/indexLink.php";   
    $titre = '';
    $rendu = ob_get_clean();
    include_once './templates/template.php';
}