<?php
require_once('model/Database.php');
include('model/Calendar.php');
include_once('model/CalendarAction.php');
include_once('model/Display.php');
date_default_timezone_set('Europe/Paris');

//$valeur = condition ? if true : if false
$m = isset($_GET['mois']) ? $_GET['mois'] : null;
$a = isset($_GET['annee']) ? $_GET['annee'] : null;
$calendrier = new Calendar($m, $a);
$db = Database::pdo();
$selection = new CalendarAction($db);

//Je récupère le précédent lundi a parti du 1er jour du mois
$start = $calendrier->getFirstDay();
$premierJour = $calendrier->getFirstDay()->modify('last monday');

//Parfois le mois commence un lundi dans ce cas la pas besoin de 'last monday' d'ou ce ternaire
$premierJour = $start->format('N') === '1' ? $start : $premierJour;

//Verification si l'utilisateur est admin ou non pour le lien de retour
$verification = new Display($db);
$id = htmlspecialchars($_GET['id']);
$admin = $verification->verificationAdmin($id);

if (isset($_GET['mois']) && isset($_GET['annee']) && isset($_GET['jour'])) {
    if (!empty($_GET['mois']) && !empty($_GET['annee']) && !empty($_GET['jour'])) {
        
        //Réserver une journée pour cuisinier
        if (isset($_GET['action']) && ($_GET['action'] == 'reserver')) {
            $mois = htmlspecialchars($_GET['mois']);
            $annee = htmlspecialchars($_GET['annee']);
            $jour = htmlspecialchars($_GET['jour']);
            $journee = "$annee-$mois-$jour";
        
            //Vérification si la journée est déjà réservée
            $result = $selection->verificationReservation($journee);
            if (isset($result->journee)) {
                ?>
                <script>
                alert('Cette journée est déja réservée.');
                </script>
                <?php
            } else {
                //Réservation de la journée
                $selection->reserver($journee, $id);
                header("Location: index.php?page=calendrier&id=".$_SESSION['id']."&token=".$_SESSION['token']."&mois=".$mois."&annee=".$annee);
            }
        }
        
        //Annuler la réservation
        if (isset($_GET['action']) && ($_GET['action'] == 'annuler')) {
            $mois = htmlspecialchars($_GET['mois']);
            $annee = htmlspecialchars($_GET['annee']);
            $jour = htmlspecialchars($_GET['jour']);
            $journee = "$annee-$mois-$jour";

            //Vérification que c'est bien l'utilisateur qui a réservé cette journée
            $result = $selection->verificationReservation($journee);
            if (isset($result->journee)) {
                if ($result->id_user == $id) {
                    //Annulation de la journée
                    $selection->annuler($journee, $id);
                    header("Location: index.php?page=calendrier&id=".$_SESSION['id']."&token=".$_SESSION['token']."&mois=".$mois."&annee=".$annee);
                } else {
                    ?>
                    <script>
                    alert("Vous n'avez pas réservé cette journée");
                    </script>
                    <?php
                }
            }
        }
    }
}

include('view/membre/calendrier.php');
require_once('view/membre/template_membre.php');