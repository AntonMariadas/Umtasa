<?php 
$title = "Distribution de repas chauds";
$description = "distribution de repas chauds tous les soirs à Chelles";
$css = "public/css/distribution.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="distribution">
    <div class="container">
        <h2>Distribution de repas chauds</h2>
        <div class="para">
            <img src="public/images/distribution/distribution7.jpg" alt="distribution">
            <p>C'est la première action née de l'association et la plus symbolique. Cette aide alimentaire est essentielle
            pour les personnes dans l'incapacité de satisfaire ce besoin primaire. Nous y veillons chaque soir grâce à votre soutien et celui des bénévoles.
            <br><br>
            Elle est <b>libre</b> et <b>ouverte à tous</b>.<br>
            Elle à lieu <b>tous les soirs</b> à <b>20H30</b>.<br>
            Nous avons <b>deux</b> points de distribution.<br>
            Les repas sont <b>halal</b> et préparés par des cuisinières bénévoles.
            </br>
        </div>
        <h2 class="subtitle">Planning de distribution</h2>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Jour</th>
                    <td>Lundi</td>
                    <td>Mardi</td>
                    <td>Mercredi</td>
                    <td>Jeudi</td>
                    <td>Vendredi</td>
                    <td>Samedi</td>
                    <td>Dimanche</td>
                </tr>
                <tr>
                    <th>Lieu de distribution</th>
                    <td><i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x hotel" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x hotel" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"></i></td>
                    <td><i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"></i></td>
                </tr>
            </table>
        </div>
        <div class="point">
            <i class="fa fa-map-marker fa-2x peugeot" aria-hidden="true"><span><b>Face au garage Peugeot,</b> 53 avenue du Maréchal Foch 77500 Chelles.</span></i><br>
            <i class="fa fa-map-marker fa-2x hotel" aria-hidden="true"><span><b>Hotêl Balladins,</b> 2 rue de l'Ormeteau 77500 Chelles.</span></i>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>