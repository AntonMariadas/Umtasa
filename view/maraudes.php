<?php 
$title = "Maraudes";
$description = "Maraude sur Paris tous les premiers samedi du mois";
$css = "public/css/maraudes.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="maraude"> 
    <div class="container">
        <h2>Maraudes</h2>
        <p>Tous les <b>1er samedi du mois</b> au soir, l'association va à la rencontre des personnes à la rue dans Paris.</p>
        <p>Il s'agit en premier lieu d'apporter une <b>attention</b> et un <b>soutien moral</b> aux plus isolés, souvent en détresse alimentaire et sociale.</p>
        <p>C'est un moment d'échange durant lequel nous leur proposons <b>nourriture, produits d'hygiène et vêtements</b>.</p>
        <div class="photos">
            <img src="public/images/maraude/maraude1.jpg" alt="maraude">
            <img src="public/images/maraude/maraude2.jpg" alt="maraude">
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
