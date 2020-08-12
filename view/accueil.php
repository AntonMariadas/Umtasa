<?php 
$title = "Association Une Main Tendue Aux Sans-Abris";
$description = "UMTASA vient en aide aux nécessiteux en distribuant des repas tous les soirs à Chelles";
$css = "public/css/accueil.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="accueil">
    <h1>Une Main Tendue Aux Sans-Abris</h1>
    <div class="logo">
        <img src="public/images/logo/logo.jfif" alt="logo">
    </div>
    <h2>vient en aide aux plus démunis...</h2>
    <hr>

    <div class="histoire">
        <h2 class="subtitle">Notre histoire</h2>
        <p>Une Main Tendue Aux Sans-Abris est une association d’utilité publique à but non lucratif,</p>
        <p>qui distribue depuis décembre 2014 des repas aux nécessiteux de la ville de Chelles.</p>
        <p>Nous avons commencé à 2 avec un thermos de café.</p>
        <p> Nous distribuons aujourd'hui près de 40 repas chaque soir à l'aide d'une équipe de plus de 50 personnes.</p>
        <img src="public/images/distribution/distribution5.jpg" alt="distribution">
        
        <h2 class="subtitle2">Grâce à votre générosité</h2>
        <p class="para2">Nous avons pu acquérir une fourgonnette déstinée à la distribution quotidienne des repas, au transport des denrées et à leur stockage.</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/CNLnZFSy5jI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <h2 class="subtitle3">Notre objectif</h2>
        <p class="para3"> Lutter contre la <b>précarité</b>, <b>l'isolement</b> et <b>l'exclusion sociale</b>.</p>
        <p class="para3">Aller à la rencontre des nécessiteux pour tisser un lien de confiance basé sur l'écoute et le dialogue. </p>
        <p class="para3">Leur proposer le nécessaire à leurs premiers besoins (repas chauds, produits d'hygiène, vêtements etc...).</p>
        <p class="para3">L'association s'est fondée sur des valeurs de <b>solidarité</b>, de <b>fraternité</b> et de <b>partage</b>.</p>
    </div>
</div>
<?php $content = ob_get_clean(); ?>




