<?php 
$title = "Espace membre";
$description = "Connexion à l'espace membre";
$css = "public/css/espace_membre.css";
$js = "";
?>

<?php ob_start(); ?>
<div id="membre">
    <div class="login">
        <h2>Authentification</h2>
        <i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
        <form action="" method="post">
            <label for="email">Email</label><br>
            <input class="form-control" type="email" name="email" placeholder="Votre adresse email"><br>
            <label for="mdp">Mot de passe</label><br>
            <input class="form-control" type="password" name="mdp" placeholder="Votre mot de passe"><br>
            <input class="form-submit" type="submit" name="authentification" value="Valider">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

