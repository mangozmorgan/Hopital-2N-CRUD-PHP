<?php
// Demarrage de la tamporisation (rien de s'affichera)
ob_start() ;

// On récupérer le paramètre indiqué dans l'URL
if(isset($_GET['view'])){

    $page = $_GET['view'] ;
    
    // Switch va tester la valeur de $page et le code correspondand au "cas"
    switch($page) :
    
        // Si $page est égal à "accueil"
        case 'accueil' :
            // On integre le contenu de la page
            include 'pages/accueil.php' ;
        break;

        default :
     
            $titre='coucou';
            include 'pages/erreur.php';
    
    endswitch ;
    
    
    // On recupere dans une variable le contenu du tampon 
    $contenu = ob_get_clean() ;
    
    // On intégre le template qui utilise la variable $contenu 
    include 'templates/template.php' ;
}else{
    include 'pages/erreur.php';
    $titre='coucou';
    $contenu = ob_get_clean() ;
     include 'templates/template.php' ;

}