<?php 
$title = "Aïd des enfants";
$description = "Distribution de jouets aux enfants pour la fête de l'Aïd";
$css = "public/css/aid.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="aid"> 
    <div class="container">
        <h2>Aïd des enfants</h2>
        <p>La <b>fête de l'Aïd</b> n'a pas pour vocation d'être ennuyeuse et terne, en particulier pour les enfants.</p>
        <p>L'association prépare chaque année à cette occasion, une <b>kermesse</b> pour les <b>enfants défavorisés</b> à l'hotêl Balladins.</p>
        <p>Nous organisons à l'approche de la fête une <b>récolte de jouets</b>, et nos cuisinières bénévoles préparent gâteaux et apéritifs.</p>
        <p>Vos enfants grandissent et ont des jouets qui ne leur plaisent plus?</p>
        <p>Plutôt que de les garder, profitez de nos <b>collectes de jouets</b> pour faire plaisir à des familles dans le besoin.</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Vh4r8fKxw7A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

