<?php
include_once('controller/Check.php');
require_once('model/Database.php');
include_once('model/Register.php');
include('view/contact.php');
require_once('view/template.php');


if (isset($_POST['message'])) {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) &&
    !empty($_POST['sujet']) && !empty($_POST['msg'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $sujet = htmlspecialchars($_POST['sujet']);
        $msg = htmlspecialchars($_POST['msg']);

        //Verification des données receptionnées
        $verification = new Check();
        $validation = $verification->validateMessage($nom, $prenom, $tel, $email);
        if ($validation) {
            //Enregistrement du message
            $db = Database::pdo();
            $inscription = new Register($db);
            $retour = $inscription->message($nom, $prenom, $tel, $email, $sujet, $msg);
            if ($retour) {
                ?>
                <script>alert('Message bien envoyé!')</script>
                <?php
                return true;
            }
            else {
                ?>
                <script>alert("Une erreur s'est produite lors de l'envoi du message!")</script>
                <?php
                return false;
                }
        }
        else {
            ?>
            <script>alert('Veuillez remplir correctement le formulaire.')</script>
            <?php
            return false;
        }
    }
    else {
        ?>
        <script>alert('Veuillez remplir tous les champs du formulaire.')</script>
        <?php
        return false;
    }
}