<?php
$title = "Espace administration";
$description = "dashboard de gestion de l'association et de ses bénévoles";
$css= "";
?>

<?php ob_start(); ?>
<div class="container">
    <h2 class="title">Espace Administration</h2>
    <nav>
        <a href="index.php?page=admin&onglet=distributeurs&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-distributeurs">Distributeurs</a>
        <a href="index.php?page=admin&onglet=cuisinieres&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-cuisinieres">Cuisinieres</a>
        <a href="index.php?page=admin&onglet=messages&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-messages">Messages</a>
        <a href="index.php?page=admin&onglet=equipes&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-equipes">Equipes</a>
        <a href="index.php?page=admin&onglet=planning&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-planning">Planning</a>
        <a href="index.php?page=calendrier&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>" class="lien-calendrier">Calendrier</a>
        <a href="index.php?page=deconnexion" class="lien-deconnexion">Déconnexion</a>
    </nav>

    <?php
    if (isset($_GET['onglet']) && !empty($_GET['onglet'])) {
        $onglet = htmlspecialchars($_GET['onglet']);
        switch ($onglet) {
            //Affichage de la liste des distributeurs
            case 'distributeurs': ?>
        <div class="distributeurs onglet" style="overflow-x:auto;">
        <table class="content-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Ville</th>
            <th>Jour</th>
            <th>Permis</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($distributeur= $sqlD->fetch(PDO::FETCH_OBJ)) {?>
        <tr>
            <td><?= $distributeur->nom ?></td>
            <td><?= $distributeur->prenom ?></td>
            <td><?= $distributeur->tel ?></td>
            <td><?= $distributeur->email ?></td>
            <td><?= $distributeur->ville ?></td>
            <td><?= $distributeur->dispo ?></td>
            <td><?= $distributeur->permis ?></td>
            <!-- Supprimer un distributeur -->
            <td> <a class="delete" href='index.php?page=admin&idd=<?=$distributeur->id_user?>&id=<?= $_SESSION["id"]?>&token=<?= $_SESSION["token"]?>'>Supprimer</a></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
        <?php
        break;

            //Affichage de la liste des cuisinières
        case 'cuisinieres': ?>
        <div class="cuisinieres onglet" style="overflow-x:auto;">
        <table class="content-table">
        <thead>
        <tr class="cat">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($cuisiniere= $sqlC->fetch(PDO::FETCH_OBJ)) {?>
        <tr>
            <td><?= $cuisiniere->nom ?></td>
            <td><?= $cuisiniere->prenom ?></td>
            <td><?= $cuisiniere->tel ?></td>
            <td><?= $cuisiniere->email ?></td>
            <td><?= $cuisiniere->adresse ?></td>
            <td><?= $cuisiniere->ville ?></td>
            <!-- Supprimer une cuisinière -->
            <td> <a class="delete" href='index.php?page=admin&idc=<?=$cuisiniere->id_user?>&id=<?= $_SESSION["id"]?>&token=<?= $_SESSION["token"]?>'>Supprimer</a></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
        <?php
        break;

            //Affichage des messages reçus
        case 'messages': ?>
        <div class="messages onglet" style="overflow-x:auto;">
        <table class="content-table">
        <thead>
        <tr class="cat2">
            <th>Date</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while($message= $sqlM->fetch(PDO::FETCH_OBJ)) {?>
        <tr>
            <td><?= $message->dates ?></td>
            <td><?= $message->nom ?></td>
            <td><?= $message->prenom ?></td>
            <td><?= $message->tel ?></td>
            <td><?= $message->email ?></td>
            <td><?= $message->sujet ?></td>
            <td><?= $message->msg ?></td>
            <!-- Supprimer un message -->
            <td> <a class="delete" href='index.php?page=admin&idm=<?=$message->id_message?>&id=<?= $_SESSION["id"]?>&token=<?= $_SESSION["token"]?>'>Supprimer</a></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
        <?php
        break;

            //Affichage des réservations
        case 'planning': ?>
        <div class="planning onglet" style="overflow-x:auto;">
        <table class="content-table">
        <thead>
        <tr class="cat3">
            <th>Date</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Ville</th>
        </tr>
        </thead>
        <tbody>
        <?php while($planning = $sqlCal->fetch(PDO::FETCH_OBJ)) {?>
        <tr>
            <td><?= $planning->dates ?></td>
            <td><?= $planning->nom ?></td>
            <td><?= $planning->prenom ?></td>
            <td><?= $planning->tel ?></td>
            <td><?= $planning->adresse ?></td>
            <td><?= $planning->ville ?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        <?php
        break;

            //Affichage des équipes
        case 'equipes': ?>
        <div class="equipes onglet" style="overflow-x:auto;">
        <form action="" method="post">
        <select name="jour" id="equipe">
            <option value="">Sélectionner un jour</option>
            <option value="lundi">Lundi</option>
            <option value="mardi">Mardi</option>
            <option value="mercredi">Mercredi</option>
            <option value="jeudi">Jeudi</option>
            <option value="vendredi">Vendredi</option>
            <option value="samedi">Samedi</option>
            <option value="dimanche">Dimanche</option>
            <input type="submit" name="equipe" value="Valider" class="valider">
        </select>
        </form>
        <table class="content-table">
        <thead>
        <tr class="cat4">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Tel</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Permis</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <!-- Affichage des distributeurs dispo sur une journée -->
        <?php if (isset($sqlDdispo)) { while($distributeurDispo = $sqlDdispo->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
        <td><?=$distributeurDispo->nom?></td>
        <td><?=$distributeurDispo->prenom?></td>
        <td><?=$distributeurDispo->tel?></td>
        <td><?=$distributeurDispo->adresse?></td>
        <td><?=$distributeurDispo->ville?></td>
        <td><?=$distributeurDispo->permis?></td>
        <!-- Ajout de ce distributeur à l'équipe du jour -->
        <td><a class="add" href="index.php?page=admin&addD=<?=$distributeurDispo->id_user?>&id=<?= $_SESSION["id"]?>&token=<?= $_SESSION["token"]?>">Ajouter</a></td>
        </tr>
        <?php }} ?>
        </tbody>
        </table>

        <div class="affichage-equipe">
        <ul>
        <h2>Lundi</h2>
        <?php $sqlMembre = $membres->membreEquipe("lundi") ?>
        <!-- Affichage de tous les membres de l'équipe lundi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreL = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
                <li><?=$membreL->nom.' '.$membreL->prenom?> <a href="index.php?page=admin&idLun=<?=$membreL->id_equipe_lundi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreL->dispo != 'lundi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Mardi</h2>
        <?php $sqlMembre = $membres->membreEquipe("mardi") ?>
        <!-- Affichage de tous les membres de l'équipe mardi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreM = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
                <li><?=$membreM->nom.' '.$membreM->prenom?> <a href=" index.php?page=admin&idMar=<?=$membreM->id_equipe_mardi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreM->dispo != 'mardi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Mercredi</h2>
        <?php $sqlMembre = $membres->membreEquipe("mercredi") ?>
        <!-- Affichage de tous les membres de l'équipe mercredi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreMer = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
                <li><?=$membreMer->nom.' '.$membreMer->prenom?> <a href=" index.php?page=admin&idMer=<?=$membreMer->id_equipe_mercredi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreMer->dispo != 'mercredi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Jeudi</h2>
        <?php $sqlMembre = $membres->membreEquipe("jeudi") ?>
        <!-- Affichage de tous les membres de l'équipe jeudi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreJ =$sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
                <li><?=$membreJ->nom.' '.$membreJ->prenom?> <a href=" index.php?page=admin&idJeu=<?=$membreJ->id_equipe_jeudi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreJ->dispo != 'jeudi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Vendredi</h2>
        <?php $sqlMembre = $membres->membreEquipe("vendredi") ?>
        <!-- Affichage de tous les membres de l'équipe vendredi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreV = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
                <li><?=$membreV->nom.' '.$membreV->prenom?> <a href=" index.php?page=admin&idVen=<?=$membreV->id_equipe_vendredi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreV->dispo != 'vendredi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Samedi</h2>
        <?php $sqlMembre = $membres->membreEquipe("samedi") ?>
        <!-- Affichage de tous les membres de l'équipe samedi avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreS = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
            <li><?=$membreS->nom.' '.$membreS->prenom?> <a href=" index.php?page=admin&idSam=<?=$membreS->id_equipe_samedi?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreS->dispo != 'samedi') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        <ul>
        <h2>Dimanche</h2>
        <?php $sqlMembre = $membres->membreEquipe("dimanche") ?>
        <!-- Affichage de tous les membres de l'équipe dimanche avec possibilité de supprimer de l'équipe -->
            <?php if(isset($sqlMembre)) { while($membreD = $sqlMembre->fetch(PDO::FETCH_OBJ)) { ?>
            <li><?=$membreD->nom.' '.$membreD->prenom?> <a href=" index.php?page=admin&idDim=<?=$membreD->id_equipe_dimanche?>&id=<?=$_SESSION["id"]?>&token=<?=$_SESSION["token"]?>">Supprimer</a> <?php if($membreD->dispo != 'dimanche') {?> <a class="indisponible">Indisponible</a> <?php }?></li>
            <?php }} ?> 
        </ul>
        </div>
        </div>
        <?php
        break;

            //Affichage de logo d'accueil
        case 'logo': ?>
        <div class="logo">
            <img src="public/images/logo/logo.jfif" alt="logo">
        </div>
        <?php
        break;
        }
    } ?>
</div>
<?php $content = ob_get_clean(); ?>
