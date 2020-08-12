<?php
require_once('model/Database.php');
include_once('model/Display.php');
include_once('model/Register.php');
include_once('model/CalendarAction.php');

$id = intval($_GET['id']);
$db = Database::pdo();
$planning = new CalendarAction($db);
$sqlBooked = $planning->afficherReservation($id);
$affichage = new Display($db);
$cuisiniere = $affichage->cuisiniere($id);
$nom = $cuisiniere->nom;
$prenom = $cuisiniere->prenom;
$tel = $cuisiniere->tel;
$email = $cuisiniere->email;
$db = null;

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

include('view/membre/profil_cuisiniere.php');
require_once('view/membre/template_membre.php');