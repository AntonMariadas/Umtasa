<?php
$title = "Modification profil";
$description = "Espace membre bénévole modification du profil distributeur";
$css = "public/css/modification_distributeur.css";
$js = "<script src='public/js/formulaire_distributeur.js'></script>";
?>

<?php ob_start(); ?>
    <div class="container">
        <h2>Modifier mon profil</h2>
        <form action="" method="post">
        <span class="erreur-genre"></span>
        <label for="homme">Je suis un homme</label>
        <input  type="radio" name="genre" id="homme" value="homme"><br>
        
        <label for="femme">Je suis une femme</label>
        <input type="radio" name="genre" id="femme" value="femme"><br><br>

        <label for="nom">Nom</label><br>
        <span class="erreur-nom"></span>
        <input class="form-input" type="text" name="nom" id="nom" value="<?php echo $distributeur->nom ?>"><br>

        <label for="prenom">Prénom</label><br>
        <span class="erreur-prenom"></span>
        <input class="form-input" type="text" name="prenom" id="prenom" value="<?php echo $distributeur->prenom ?>"><br>

        <label for="adresse">Adresse</label><br>
        <span class="erreur-adresse"></span>
        <input class="form-input" type="text" name="adresse" id="adresse" value="<?php echo $distributeur->adresse ?>"><br>

        <label for="cp">Code postal</label><br>
        <span class="erreur-cp"></span>
        <input class="form-input" type="text" name="cp" id="cp" value="<?php echo $distributeur->cp ?>"><br>

        <label for="ville">Ville</label><br>
        <span class="erreur-ville"></span>
        <input class="form-input" type="text" name="ville" id="ville" value="<?php echo $distributeur->ville ?>"><br>

        <label for="tel">Tél</label><br>
        <span class="erreur-tel"></span>
        <input class="form-input" type="text" name="tel" id="tel" placeholder="format 06XXXXXXXX" value="<?php echo $distributeur->tel ?>"><br>

        <label for="email">Email</label><br>
        <span class="erreur-email"></span>
        <input class="form-input" type="email" name="email" id="email" value="<?php echo $distributeur->email ?>"><br>

        <label for="mdp">Mot de passe</label><br>
        <span class="erreur-mdp"></span>
        <input class="form-input" type="password" name="mdp" id="mdp" placeholder="six caractères minimum"><br>

        <label for="confirmation">Confirmer votre mot de passe</label><br>
        <span class="erreur-confirmation"></span>
        <input class="form-input" type="password" name="confirmation" id="confirmation" placeholder="doit être identique au champ précédent"><br><br>

        <p>En général je suis disponible en soirée le</p><br>
        <span class="erreur-dispo"></span>
        <label for="lundi">Lundi</label>
        <input class="week-input" type="radio" name="jour" id="lundi" value="lundi">
        <label for="mardi">Mardi</label>
        <input class="week-input" type="radio" name="jour" id="mardi" value="mardi">
        <label for="mercredi">Mercredi</label>
        <input class="week-input" type="radio" name="jour" id="mercredi" value="mercredi">
        <label for="jeudi">Jeudi</label>
        <input class="week-input" type="radio" name="jour" id="jeudi" value="jeudi">
        <label for="vendredi">Vendredi</label>
        <input class="week-input" type="radio" name="jour" id="vendredi" value="vendredi"><br>
        <label for="samedi">Samedi</label>
        <input class="week-input" type="radio" name="jour" id="samedi" value="samedi">
        <label for="dimanche">Dimanche</label>
        <input class="week-input" type="radio" name="jour" id="dimanche" value="dimanche"><br><br>

        <p>Permis auto - catégorie B</p><br>
        <span class="erreur-permis"></span>
        <label for="oui">Oui</label>
        <input type="radio" name="permis" id="oui" value="oui">
        <label for="non">Non</label>
        <input type="radio" name="permis" id="non" value="non"><br><br>
        <input class="send" type="submit" value="Modifier" name="modification-distributeur">
        </form>
    </div>
    <a href="index.php?page=profil-distributeur&onglet=logo&id=<?=$_SESSION['id']?>&token=<?=$_SESSION['token']?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
<?php $content = ob_get_clean(); ?>
