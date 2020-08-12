<?php
$title = "Modification profil";
$description = "Espace membre bénévole modification du profil cuisinière";
$css = "public/css/modification_cuisiniere.css";
$js = "<script src='public/js/formulaire_cuisiniere.js'></script>";
?>

<?php ob_start(); ?>
<div class="container">
    <h2>Modifier mon profil</h2>
    <form action="" method="post">
        <label for="nom">Nom</label><br>
        <span class="erreur-nom"></span>
        <input class="form-input" type="text" name="nom" id="nom" value="<?php echo $cuisiniere->nom ?>"><br>

        <label for="prenom">Prénom</label><br>
        <span class="erreur-prenom"></span>
        <input class="form-input" type="text" name="prenom" id="prenom" value="<?php echo $cuisiniere->prenom ?>"><br>

        <label for="adresse">Adresse</label><br>
        <span class="erreur-adresse"></span>
        <input class="form-input" type="text" name="adresse" id="adresse" value="<?php echo $cuisiniere->adresse ?>"><br>

        <label for="cp">Code postal</label><br>
        <span class="erreur-cp"></span>
        <input class="form-input" type="text" name="cp" id="cp" value="<?php echo $cuisiniere->cp ?>"><br>

        <label for="ville">Ville</label><br>
        <span class="erreur-ville"></span>
        <input class="form-input" type="text" name="ville" id="ville" value="<?php echo $cuisiniere->ville ?>"><br>

        <label for="tel">Tél</label><br>
        <span class="erreur-tel"></span>
        <input class="form-input" type="text" name="tel" id="tel" placeholder="format 06XXXXXXXX" value="<?php echo $cuisiniere->tel ?>"><br>

        <label for="email">Email</label><br>
        <span class="erreur-email"></span>
        <input class="form-input" type="email" name="email" id="email" value="<?php echo $cuisiniere->email ?>"><br>

        <label for="mdp">Mot de passe</label><br>
        <span class="erreur-mdp"></span>
        <input class="form-input" type="password" name="mdp" id="mdp" placeholder="six caractères minimum"><br>

        <label for="confirmation">Confirmer votre mot de passe</label><br>
        <span class="erreur-confirmation"></span>
        <input class="form-input" type="password" name="confirmation" id="confirmation" placeholder="doit être identique au champ précédent"><br><br>
        <input class="send" type="submit" value="Modifier" name="modification-cuisiniere">
    </form>
</div>
<a href="index.php?page=profil-cuisiniere&onglet=logo&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
<?php $content = ob_get_clean(); ?>







