<?php
$title = "Calendrier";
$description = "Réserver une journée pour cuisinier";
$css = "public/css/calendrier.css";
$js = "<script src='public/js/calendrier.js'></script>";
?>

<?php ob_start(); ?>
<nav>
    <h2> <?php if($admin) {echo 'Calendrier';} else { echo 'Mes disponibilités';} ?> </h2>
    <a href="index.php?<?php if($admin) {echo 'page=admin';} else { echo 'page=profil-cuisiniere';} ?>&onglet=logo&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
</nav>

<div class="affichageMoisAnnee">
    <a href="index.php?page=calendrier&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>&mois=<?=$calendrier->previousMonth()->mois;?>&annee=<?=$calendrier->previousMonth()->annee?>" class="fleche"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
    <h1> <?= $calendrier->toString(); ?> </h1>
    <a href="index.php?page=calendrier&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>&mois=<?=$calendrier->nextMonth()->mois;?>&annee=<?=$calendrier->nextMonth()->annee?>" class="fleche"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
</div>

<table class="calendar"<?= $calendrier->getWeeks(); ?>weeks">
<?php for ($i = 0; $i < $calendrier->getWeeks(); $i++) { ?>
<tr>
    <?php foreach($calendrier->days as $k => $day ) { ?>
        <td>
            <?php if ($i == 0) { ?> <div class="weekday"> <?= $day ?> </div> <?php } ?>
            <div class="number">
                <?php $date = clone $premierJour?> <?= $jour = $date->modify("+".($k + $i *7)." days")->format('d');?> 
                <a class="s" href="index.php?page=calendrier&action=reserver&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>&mois=<?=$calendrier->mois?>&annee=<?=$calendrier->annee?>&jour=<?=$jour?>">
                    <i class="fa fa-thumb-tack
                        <?php $journee="$calendrier->annee-$calendrier->mois-$jour";
                        $result=$selection->verificationReservation($journee);
                        if(isset($result->journee)) { 
                            if($result->id_user == $_SESSION['id']) {
                                echo "booked";
                            }else {
                                echo "other";
                            }
                        }?>" aria-hidden="true">
                    </i>
                </a>
                <a href="index.php?page=calendrier&action=annuler&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>&mois=<?=$calendrier->mois?>&annee=<?=$calendrier->annee?>&jour=<?=$jour?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                <!-- Je véririfie que le jour est bien dans le mois -->
                <?php $j = clone $premierJour; if (($start->format('Y-m')) != ($j->modify("+".($k + $i *7)." days")->format('Y-m'))) { ?>
                <h6 class="indisponible">Indisponible</h6>
                <?php } ?>
            </div>
        </td>
    <?php } ?>
</tr>
<?php } ?>
</table>
<?php $content = ob_get_clean(); ?>

