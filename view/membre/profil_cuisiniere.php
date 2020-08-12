<?php
$title = "Profil cuisinière";
$description = "Espace membre bénévole cuisinière";
$css = "public/css/profil_cuisiniere.css";
$js = "";
?>

<?php ob_start(); ?>
    <div class="container">
        <h2>Bienvenue sur votre espace bénévole</h2>
        <div class="profil">
            <h4><?= strtoupper($nom) ?></h4>
            <h4><?= $prenom ?></h4>
            <div class="liens">
                <a class="edition" href=<?php echo "index.php?page=modification-cuisiniere&id=".$_SESSION['id']."&token=".$_SESSION['token']?>>Modifier mon profil</a>
                <a class="msg" href="index.php?page=profil-cuisiniere&onglet=msg&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Envoyer un message à l'administrateur</a>
                <a class="calendrier" href="index.php?page=calendrier&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Choisir mes disponibilités</a>
                <a class="planning" href="index.php?page=profil-cuisiniere&onglet=planning&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>">Voir mon planning</a>
                <a class="deconnexion" href="index.php?page=deconnexion">Se déconnecter</a>
            </div>
        </div>

        <?php
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

                case 'planning': ?>
                <div class="cuisinieres onglet" style="overflow-x:auto;">
                <h2 class="title-planning">Mon planning</h2>
                <table class="content-table">
                <thead>
                <tr class="cat">
                    <th>Dates</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($reservation = $sqlBooked->fetch(PDO::FETCH_OBJ)) { ?>
                <tr>
                    <td><?= $reservation->dates ?></td>
                </tr>
                <?php } ?>
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
<?php $content = ob_get_clean(); ?>

