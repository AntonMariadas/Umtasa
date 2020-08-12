<?php
$title = "Profil distributeur";
$description = "Espace membre bénévole distributeur";
$css = "public/css/profil_distributeur.css";
$js = "";
?>

<?php ob_start(); ?>
    <div class="container">
        <h2>Bienvenue sur votre espace bénévole</h2>
        <div class="profil">
            <h4><?= strtoupper($distributeur->nom) ?></h4>
            <h4><?= $distributeur->prenom ?></h4>
            <h4><?= 'Disponible le'.' '.$distributeur->dispo ?></h4>
            <div class="liens">
                <a class="edition" href=<?php echo "index.php?page=modification-distributeur&id=".$_SESSION['id']."&token=".$_SESSION['token']?>>Modifier mon profil</a>
                <a class="msg" href="index.php?page=profil-distributeur&onglet=msg&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Envoyer un message à l'administrateur</a>
                <a class="equipe" href="index.php?page=profil-distributeur&onglet=equipe&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Voir les membres mon équipe</a>
                <a class="cuisiniere" href="index.php?page=profil-distributeur&onglet=cuisiniere&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Voir le planning cuisinière</a>
                <a class="deconnexion" href="index.php?page=deconnexion">Se déconnecter</a>
            </div>
        </div>

        <div class="box">
        <?php
        //Affichage de l'onglet cliqué
        if (isset($_GET['onglet']) && !empty($_GET['onglet'])) {
            $onglet = htmlspecialchars($_GET['onglet']);
            switch ($onglet) {
                case 'msg': ?>
                <div class="message">
                <h2 class="title-message">Mon message</h2>
                <form action="" method="post">
                <input type="text" name="sujet" id="sujet" placeholder="Sujet"><br>
                <textarea name="msg" id="" cols="30" rows="10" placeholder="Tapez votre message ici..."></textarea><br>
                <input class="envoyer" type="submit" value="Envoyer" name="message">
                </form>
                </div>
                <?php
                break;

                case 'equipe': ?>
                <div class="planning" style="overflow-x:auto;">
                <h2 class="title-planning">Mon équipe</h2>
                <table class="content-table">
                <thead>
                <tr class="cat">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($erreur) { ?>
                <div class="erreur">
                <p>Vous ne faîtes actuellement parti d'aucune équipe.</p>
                </div>
                <?php
                } else {
                while($membre = $sql->fetch(PDO::FETCH_OBJ)) {?>
                <tr>
                    <td><?=$membre->nom?></td>
                    <td><?=$membre->prenom?></td>
                    <td><?=$membre->tel?></td>
                    <td><?=$membre->adresse?></td>
                    <td><?=$membre->ville?></td>
                </tr>
                <?php }} ?>
                </tbody>
                </table>
                </div>
                <?php
                break;

                case 'cuisiniere': ?>
                <div class="planning" style="overflow-x:auto;">
                <h2 class="title-planning">Planning cuisinière</h2>
                <table class="content-table">
                <thead>
                <tr class="cat2">
                    <th>Date</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Tel</th>
                </tr>
                </thead>
                <tbody> <?php
                if (isset($sqlCalJour)) {
                while($cuisiniere = $sqlCalJour->fetch(PDO::FETCH_OBJ)) {?>
                <tr>
                    <td><?= $cuisiniere->dates ?></td>
                    <td><?= $cuisiniere->adresse ?></td>
                    <td><?= $cuisiniere->ville ?></td>
                    <td><?= $cuisiniere->tel ?></td>
                </tr>
                <?php }} $db = null; ?>
                </tbody>
                </table>
                </div>
                <?php
                break;
                
                case 'logo': ?>
                <div class="logo">
                <img src="public/images/logo/membre.jpg" alt="logo">
                </div>
                <?php
                break;
            }
        }
        ?>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>









