<?php 
$title = "Livraison de colis alimentaires";
$description = "Distribution de colis alimentaires aux familles nécessiteuses de Chelles";
$css = "public/css/colis.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="colis">
    <div class="container">
        <h2>Livraison de colis alimentaire</h2>
        <p>Tous les <b>15 du mois</b>, nous assurons une distribution de <b>colis alimentaire</b> sur Chelles à destinations des familles dans le besoin.</p>
        <p>L'objectif est de <b>soulager</b> la bourse de ces familles afin <b>d'améliorer</b> leur quotidien.</p>
        <p>Pour prétendre au colis alimentaire et faire partie de nos bénéficiaires, <b>laisser nous un message</b> via la page <a href="index.php?page=contact">contact</a>.</p>
        <p>Nous ne manquerons pas de revenir vers vous.</p>
    </div>
    <img src="public/images/colis/colis3.jpg" alt="colis">
</div>
<?php $content = ob_get_clean(); ?>
