<?php
require_once('model/Database.php');
include('model/Display.php');
include('model/Update.php');
include('controller/Check.php');

$id = $_SESSION['id'];
$db = Database::pdo();
$affichage = new Display($db);
$cuisiniere = $affichage->cuisiniere($id);

if (isset($_POST['modification-cuisiniere'])) {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville']) &&
    !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['confirmation'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $mdpTemp = $_POST['mdp'];
        $confirmation = $_POST['confirmation'];
        $emailOriginal = $cuisiniere->email;

        //Verification des données receptionnées
        $verification = new Check();
        $validation = $verification->validate($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdpTemp, $confirmation);
        if ($validation) {
            $mdp = password_hash($mdpTemp, PASSWORD_BCRYPT);
            $db = Database::pdo();

            //Verification si l'adresse mail est déjà utilisée par une autre cuisinière
            $sql = $db->prepare("SELECT email FROM users WHERE email=?");
            $sql->execute(array($email));
            $result = $sql->rowCount();
            if (($email != $emailOriginal)&&($result > 0)) {
                ?>
                <script>alert('Cette adresse email est déja utilisée par un autre membre.')</script>
                <?php
                $db = null;
            }
            //Vérification que la cuisinière garde son adresse mail ou en choisis une qui n'est pas utilisée par une autre cuisinière
            else if ((($email == $emailOriginal)&&($result == 1)) || (($email != $emailOriginal)&&($result == 0))) {
                //Si oui, modification
                $modification = new Update($db);
                $retour = $modification->cuisiniere($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $id);
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

include('view/membre/modification_cuisiniere.php');
require_once('view/membre/template_membre.php');

