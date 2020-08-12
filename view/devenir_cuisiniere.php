<?php 
$title = "Devenir cuisinière";
$description = "Cuisiner pour l'association";
$css = "public/css/devenir_cuisiniere.css";
$js = "<script src='public/js/formulaire_cuisiniere.js'></script>";
?>

<?php ob_start(); ?>
<div id="cuisiniere">
    <h2 class="quote">Selon Abou Hourayra (رضي الله عنه), le Messager d'Allah (صلى الله عليه و سلم) a dit :

    "Jamais une aumône n'a rien diminué d'une richesse".
        
    (Mouslim)</h2>

    <h2 class="form-title">Mes informations</h2>
    <div class="alert">
        <i class="fa fa-sticky-note fa-2x" aria-hidden="true"></i>
        <p>L'association fournit tous les produits et le matériel nécessaire pour cuisiner.</p>
    </div>

    <form action="" method="post" name="cuisiniere" class="cuisiniere">
        <label for="nom">Nom</label><br>
        <span class="erreur-nom"></span>
        <input class="form-input" type="text" name="nom" id="nom"><br>

        <label for="prenom">Prénom</label><br>
        <span class="erreur-prenom"></span>
        <input class="form-input" type="text" name="prenom" id="prenom"><br>

        <label for="adresse">Adresse</label><br>
        <span class="erreur-adresse"></span>
        <input class="form-input" type="text" name="adresse" id="adresse"><br>

        <label for="cp">Code postal</label><br>
        <span class="erreur-cp"></span>
        <input class="form-input" type="text" name="cp" id="cp"><br>

        <label for="ville">Ville</label><br>
        <span class="erreur-ville"></span>
        <input class="form-input" type="text" name="ville" id="ville"><br>

        <label for="tel">Tél</label><br>
        <span class="erreur-tel"></span>
        <input class="form-input" type="text" name="tel" id="tel" placeholder="format 06XXXXXXXX"><br>

        <label for="email">Email</label><br>
        <span class="erreur-email"></span>
        <input class="form-input" type="email" name="email" id="email"><br>

        <label for="mdp">Mot de passe</label><br>
        <span class="erreur-mdp"></span>
        <input class="form-input" type="password" name="mdp" id="mdp" placeholder="six caractères minimum"><br>

        <label for="confirmation">Confirmer votre mot de passe</label><br>
        <span class="erreur-confirmation"></span>
        <input class="form-input" type="password" name="confirmation" id="confirmation" placeholder="doit être identique au champ précédent"><br><br>
        <input class="send" type="submit" value="Valider" name="cuisiniere">
    </form>
</div>
<?php $content = ob_get_clean(); ?>


