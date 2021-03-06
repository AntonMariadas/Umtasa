<?php
include_once('controller/Check.php');
require_once('model/Database.php');
include_once('model/Register.php');
include('view/devenir_cuisiniere.php');
require_once('view/template.php');


if (isset($_POST['cuisiniere'])) {

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

        //Verification des données receptionnées
        $verification = new Check();
        $validation = $verification->validate($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdpTemp, $confirmation);
        if ($validation) {
            $mdp = password_hash($mdpTemp, PASSWORD_BCRYPT);
            $db = Database::pdo();
            
            //Verification si l'adresse mail existe en bdd
            $sql = $db->prepare("SELECT email FROM users WHERE email=?");
            $sql->execute(array($email));
            $result = $sql->fetch(PDO::FETCH_OBJ);
            if (isset($result->email)) {
                ?>
                <script>alert('Vous êtes déjà inscrite en tant que cuisiniere.')</script>
                <?php
                return false;
            }
            else {
                //Si non, inscription
                $inscription = new Register($db);
                $retour = $inscription->cuisiniere($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp);
                if ($retour) {
                    ?>
                    <script>alert('Vous êtes bien inscrit!')</script>
                    <?php
                }
                else {
                    ?>
                    <script>alert("Une erreur s'est produite lors de l'inscription.")</script>
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