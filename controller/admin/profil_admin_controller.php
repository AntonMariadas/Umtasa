<?php
require_once('model/Database.php');
include_once('model/Display.php');
include_once('model/Delete.php');
include_once('model/Equipe.php');
include_once('controller/Check.php');
include_once('/model/CalendarAction.php');

$db = Database::pdo();
$affichage = new Display($db);
$sqlD = $affichage->distributeurs();
$sqlC = $affichage->cuisinieres();
$sqlM = $affichage->messages();
$membres = new Equipe($db);
$calendrier = new CalendarAction($db);
$sqlCal = $calendrier->afficherCalendrier();
$db = null;

//Affichage des distributeurs sur la journée choisie
if ((isset($_POST['equipe'])) && (!empty($_POST['jour']))) {
    $jour = htmlspecialchars($_POST['jour']);
    $db = Database::pdo();
    $affichage = new Display($db);
    $sqlDdispo = $affichage->distributeursDispo($jour);
    $db = null;
}

//Ajouter un distributeur à une équipe
if (isset($_GET['addD']) && !empty($_GET['addD'])) {
    $id = htmlspecialchars($_GET['addD']);
    $db = Database::pdo();
    $affichage = new Display($db);
    $distributeur = $affichage->distributeur($id);
    $jour = $distributeur->dispo;

    $db = Database::pdo();
    $ajout = new Equipe($db);

    switch ($jour) {
    case 'lundi':
    case 'mardi':
    case 'mercredi':
    case 'jeudi':
    case 'vendredi':
    case 'samedi':
    case 'dimanche':
        //Verification si le distributeur est déjà inscrit dans l'equipe
        $sql = $db->prepare('SELECT * FROM equipe_'.$jour.' WHERE id_user=?');
        $sql->execute(array($id));
        $result = $sql->fetch(PDO::FETCH_OBJ);
        if (isset($result->id_user)) {
            header("Location: index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
            exit;
        }
        else {
            //Si non, inscription dans l'equipe
            $ajout->ajoutEquipe($jour, $id);
            header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
            exit;
        }
    break;
    }
}

//Supprimer un message
if (isset($_GET['idm']) && !empty($_GET['idm'])) {
    $idm = htmlspecialchars($_GET['idm']);
    $db = Database::pdo();
    $supprimer = new Delete($db);
    $supprimer->message($idm);
    header("Location: index.php?page=admin&onglet=messages&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un distributeur
if (isset($_GET['idd']) && !empty($_GET['idd'])) {
    $idd = htmlspecialchars($_GET['idd']);
    $db = Database::pdo();
    $supprimer = new Delete($db);
    $supprimer->benevole($idd);
    header("Location:  index.php?page=admin&onglet=cuisinieres&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer une cuisinière
if (isset($_GET['idc']) && !empty($_GET['idc'])) {
    $idc = htmlspecialchars($_GET['idc']);
    $db = Database::pdo();
    $supprimer = new Delete($db);
    $supprimer->benevole($idc);
    header("Location:  index.php?page=admin&onglet=cuisinieres&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du lundi
if (isset($_GET['idLun']) && !empty($_GET['idLun'])) {
    $idLun = htmlspecialchars($_GET['idLun']);
    $jour = "lundi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idLun);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du mardi
if (isset($_GET['idMar']) && !empty($_GET['idMar'])) {
    $idMar = htmlspecialchars($_GET['idMar']);
    $jour = "mardi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idMar);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du mercredi
if (isset($_GET['idMer']) && !empty($_GET['idMer'])) {
    $idMer = htmlspecialchars($_GET['idMer']);
    $jour = "mercredi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idMer);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du jeudi
if (isset($_GET['idJeu']) && !empty($_GET['idJeu'])) {
    $idJeu = htmlspecialchars($_GET['idJeu']);
    $jour = "jeudi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idJeu);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du vendredi
if (isset($_GET['idVen']) && !empty($_GET['idVen'])) {
    $idVen = htmlspecialchars($_GET['idVen']);
    $jour = "vendredi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idVen);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du samedi
if (isset($_GET['idSam']) && !empty($_GET['idSam'])) {
    $idSam = htmlspecialchars($_GET['idSam']);
    $jour = "samedi";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idSam);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

//Supprimer un membre de l'équipe du dimanche
if (isset($_GET['idDim']) && !empty($_GET['idDim'])) {
    $idDim = htmlspecialchars($_GET['idDim']);
    $jour = "dimanche";
    $db = Database::pdo();
    $retirer = new Equipe($db);
    $retirer->deleteEquipe($jour, $idDim);
    header("Location:  index.php?page=admin&onglet=equipes&id=".$_SESSION['id']."&token=".$_SESSION['token']);
    exit;
}

include('view/admin/profil_admin.php');
require_once('view/admin/template_admin.php');
