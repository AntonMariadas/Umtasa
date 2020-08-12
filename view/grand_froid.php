<?php 
$title = "Opération grand froid";
$description = "Récolte de vêtements chauds, couvertures, duvets pour l'hiver";
$css = "public/css/grand_froid.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="froid">
    <div class="container">
        <h2>Opération grand froid</h2>
        <p>L'association ne reçoit aucune contribution de l'Etat, il est donc vital pour l'association d'organiser des collectes.</p>
        <p>Ces collectes ont lieu durant la période hivernale et nous cherchons en priorité des <b>vêtements chauds</b> (manteaux, echarpes, bonnets et gants)</p>
        <p>Grâce à vos dons, nous achetons également des <b>abris d'urgence</b> contre le froid (tentes, sacs de couchage, couvertures) pour les sans-abris.</p>
        <p>Suivez-nous sur les réseaux sociaux et tenez-vous informé de la prochaine opération!</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/FYawWZBwzUI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div> 
</div>
<?php $content = ob_get_clean(); ?>
