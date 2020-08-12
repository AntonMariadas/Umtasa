<?php
require_once('model/Database.php');
include_once('model/Display.php');
include_once('model/Register.php');
include_once('model/Equipe.php');
include_once('model/CalendarAction.php');

$id = htmlspecialchars($_GET['id']);
$db = Database::pdo();
$affichage = new Display($db);
$equipe = new Equipe($db);
$calendrier = new CalendarAction($db);
$sqlCal = $calendrier->afficherCalendrier();
$erreur = false;

$distributeur = $affichage->distributeur($id);
$nom = $distributeur->nom;
$prenom = $distributeur->prenom;
$tel = $distributeur->tel;
$email = $distributeur->email;
$jour = $distributeur->dispo;
$journee = ['lundi'=>2, 'mardi'=>3, 'mercredi'=>4, 'jeudi'=>5, 'vendredi'=>6, 'samedi'=>7, 'dimanche'=>1];

switch ($jour) {
    //Vérification si le distributeur est membre d'une équipe
    case 'lundi':
    case 'mardi':
    case 'mercredi':
    case 'jeudi':
    case 'vendi':
    case 'samedi':
    case 'dimanche':
        $verification = $db->prepare('SELECT * FROM equipe_'.$jour.' WHERE id_user=?');
        $verification->execute(array($id));
        $resultat = $verification->fetch(PDO::FETCH_OBJ);
        if (isset($resultat->id_user)) {
            //Si oui on affiche les membres de son equipe ainsi que le calendrier de distribution
            $sql = $equipe->membreEquipe($jour);
            $sqlCalJour = $calendrier->afficherCalendrierJour($journee[$jour]);
        } else {
            $erreur = true;
        }
        $db = null;
    break;
}

//Envoi de message à l'admin
if (isset($_POST['message']) && !empty($_POST['msg']) && !empty($_POST['sujet'])) {    
    $sujet = htmlspecialchars($_POST['sujet']);
    $msg = htmlspecialchars($_POST['msg']);
    $db = Database::pdo();
    $enregistrement = new Register($db);
    $retour = $enregistrement->message($nom, $prenom, $tel, $email, $sujet, $msg);
    $db = null;
    if ($retour) {
        ?>
        <script>
            alert('Message envoyé!');
        </script>
        <?php
    }
    else {
        ?>
        <script>
            alert("Une erreur s'est produite lors de l'envoi du message.");
        </script>
        <?php
    }
}

include('view/membre/profil_distributeur.php');
require_once('view/membre/template_membre.php');


