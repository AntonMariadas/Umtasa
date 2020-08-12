<?php

class Router {

    public static function route($page) {

        switch($page) {

            case 'accueil':
                include('controller/accueil_controller.php');
            break;
            case 'distribution':
                include('controller/distribution_controller.php');
            break;
        
            case 'colis':
                include('controller/colis_controller.php');
            break;
        
            case 'maraudes':
                include('controller/maraudes_controller.php');
            break;
        
            case 'froid':
                include('controller/grand_froid_controller.php');
            break;
        
            case 'aid':
                include('controller/aid_controller.php');
            break;
        
            case 'partenaire':
                include('controller/devenir_partenaire_controller.php');
                
            break;
        
            case 'distributeur':
                include('controller/devenir_distributeur_controller.php');
                
            break;
        
            case 'cuisiniere':
                include('controller/devenir_cuisiniere_controller.php');
                
            break;
        
            case 'contact':
                include('controller/contact_controller.php');
                
            break;
        
            case 'espace-membre':
                include('controller/espace_membre_controller.php');
                
            break;
        
            case 'profil-distributeur':
                include('controller/membre/profil_distributeur_controller.php');
            break;
        
            case 'modification-distributeur':
                include('controller/membre/modification_distributeur_controller.php');
            break;
        
            case 'profil-cuisiniere':
                include('controller/membre/profil_cuisiniere_controller.php');
            break;
        
            case 'modification-cuisiniere':
                include('controller/membre/modification_cuisiniere_controller.php');
            break;
        
            case 'calendrier':
                include('controller/membre/calendrier_controller.php');
            break;
        
            case 'admin':
                include('controller/admin/profil_admin_controller.php');
            break;

            case 'deconnexion':
                include('controller/membre/deconnexion.php');
            break;
            
            default:
            include('controller/accueil_controller.php');
        }
    }
}