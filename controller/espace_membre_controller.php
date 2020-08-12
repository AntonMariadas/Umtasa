<?php
require_once('model/Database.php');
include_once('model/Connection.php');
include_once('controller/Check.php');

if (isset($_POST['authentification'])) {

    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

        $email = htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];
        $db = Database::pdo();
        $connexion = new Connection($db);
        $connexion->login($email, $mdp);
    }
    else {
        ?>
        <script>alert('Veuillez remplir tous les champs du formulaire.')</script>
        <?php
        return false;
    }
}

include('view/espace_membre.php');
require_once('view/template.php');



