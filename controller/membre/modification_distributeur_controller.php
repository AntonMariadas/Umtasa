<?php
require_once('model/Database.php');
include_once('model/Display.php');
include_once('model/Update.php');
include_once('controller/Check.php');

$id = $_SESSION['id'];
$db = Database::pdo();
$affichage = new Display($db);
$distributeur = $affichage->distributeur($id);

if (isset($_POST['modification-distributeur'])) {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville'])
    && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['confirmation'])
    && !empty($_POST['genre']) && !empty($_POST['jour']) && !empty($_POST['permis'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $mdpTemp = $_POST['mdp'];
        $confirmation = $_POST['confirmation'];
        $genre = $_POST['genre'];
        $dispo = $_POST['jour'];
        $permis = $_POST['permis'];
        $emailOriginal = $distributeur->email;

        //Verification des données receptionnées
        $verification = new Check();
        $validation = $verification->validate($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdpTemp, $confirmation);
        if ($validation) {
            $mdp = password_hash($mdpTemp, PASSWORD_BCRYPT);
            $db = Database::pdo();

            //Verification si l'adresse mail est déjà utilisée par un autre distributeur
            $sql = $db->prepare("SELECT email FROM users WHERE email=?");
            $sql->execute(array($email));
            $result = $sql->rowCount();
            if (($email != $emailOriginal)&&($result > 0)) {
                ?>
                <script>alert('Cette adresse email est déja utilisée par un autre membre.')</script>
                <?php
                $db = null;
            }
            //Vérification que le distributeur garde son adresse mail ou en choisis une qui n'est pas utilisée par un autre distributeur
            else if ((($email == $emailOriginal)&&($result == 1)) || (($email != $emailOriginal)&&($result == 0))) {
                //Si oui, modification
                $modification = new Update($db);
                $retour = $modification->distributeur($genre, $nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $permis, $dispo, $id);
                if ($retour) {
                    ?>
                    <script>alert('Profil mis à jour!')</script>
                    <?php
                }
                else {
                    ?>
                    <script>alert('Erreur lors de la modification du profil.')</script>
                    <?php
                }
            }
        }
        else {
            ?>
            <script>alert('Veuillez remplir correctement le formulaire.')</script>
            <?php
        }
    }
    else {
        ?>
        <script>alert('Veuillez remplir tous les champs du formulaire.')</script>
        <?php
    }
}

include('view/membre/modification_distributeur.php');
require_once('view/membre/template_membre.php');

