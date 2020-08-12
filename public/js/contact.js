$(function() {

$("#nom, #prenom, #email, #tel, #sujet, #message").focus(function() {
    $(this).css("border-bottom", "1px solid gray");
})

$(".fermer").click(function() {
    $(".modal").fadeOut();
})

const patternString = /^[a-zA-Z]*$/;
const patternNumber = /^[0-9]*$/;
const patternEmail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

//Vérification côté client à l'envoi du formulaire de contact
$(".contact").submit( function() {
    let nom = $("#nom").val();
    let prenom = $("#prenom").val();
    let email = $("#email").val();
    let tel = $("#tel").val();
    let sujet = $("#sujet").val();
    let message = $("#message").val();

    if (nom.length < 2) {
        $("#nom").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Deux caractères minimum.");
        return false
    }
    else if (!patternString.test(nom)) {
        $("#nom").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Veuillez saisir correctement votre nom.");
        return false
    }
    else if (prenom.length < 2) {
        $("#prenom").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Deux caractères minimum.");
        return false
    }
    else if (!patternString.test(prenom)) {
        $("#prenom").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Veuillez saisir correctement votre prénom.");
        return false
    }
    else if (!patternEmail.test(email)) {
        $("#email").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Veuillez saisir une adresse email valide.");
        return false
    }
    else if ((tel.length != 10) || (!patternNumber.test(tel))) {
        $("#tel").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Veuillez saisir un numéro de téléphone valide sans espace.");
        return false
    }
    else if (sujet.length < 2) {
        $("#sujet").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Deux caractères minimum.");
        return false
    }
    else if (message.length < 5) {
        $("#message").css("border-bottom", "2px solid red");
        $(".modal").fadeIn();
        $(".alert").text("Cinq caractères minimum.");
        return false
    }
    else {
        let envoyer = confirm("Valider l'envoi du message?");
        if (envoyer) {
            return true
        }
        else {
            return false
        }
    }
})
})