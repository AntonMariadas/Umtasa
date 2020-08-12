<?php 
$title = "Devenir partenaire";
$description = "Commercants ou grandes enseignes voulant participer par le biais de partenariat";
$css = "public/css/devenir_partenaire.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="partenaire">
    <div class="container">
        <h2>En devenant partenaire</h2>
        <ul>
            <li>Vous nous donnez la possibilité de poursuivre nos actions.</li>
            <li>Vous permettez à chacun de se nourrir convenablement avec des produits de qualité.</li>
            <li>Vous luttez contre le gaspillage alimentaire.</li>
        </ul>
    </div>
        <img class="recolte" src="public/images/partenaire/partenaire7.jpg" alt="">
    <div class="container2">
        <h2 class="subtitle">Rejoignez-nous:</h2>
        <p><b>unemaintendueauxsansabris77@gmail.com</b></p>

        <h2 class="subtitle2">L'association tient à remercier ses partenaires</h2>
        <div class="partenaire">
            <img class="hyperu" src="public/images/logo/hyperU.jpg" alt="">
            <img src="public/images/logo/boulangerie.jpg" alt="">
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
