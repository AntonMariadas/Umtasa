<?php 
$title = "Contact";
$description = "Contacter l'association UMTASA";
$css = "public/css/contact.css";
$js = "<script src='public/js/contact.js'></script>";
?>

<?php ob_start(); ?>
<div id="contact">
    <div class="contact-title">
        <h2>UN RENSEIGNEMENT? UNE SUGGESTION?</h2>
        <h2>Nous sommes à votre écoute!</h2>
    </div>
    <div class="contact-form">
        <form action="" method="post" name="contact" class="contact">
            <input type="text" class="form-control" name="nom" placeholder="Votre nom" id="nom"><br>
            <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" id="prenom"><br>
            <input type="text" class="form-control" name="email" placeholder="Votre adresse email" id="email" ><br>
            <input type="text" class="form-control" name="tel" placeholder="Votre n° de téléphone" id="tel"><br>
            <input type="text" class="form-control" name="sujet" placeholder="Sujet" id="sujet"><br>
            <textarea name="msg" class="form-control" cols="30" rows="4" placeholder="Message" id="message"></textarea><br>
            <input type="submit" class="form-submit" name="message" value="Envoyer votre message">
        </form>
    </div>
    <div class="modal">
        <h3 class="alert"></h3>
        <button class="fermer">Fermer</button>
    </div>
</div>
<?php $content = ob_get_clean(); ?>


