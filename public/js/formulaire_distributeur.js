$(function() {

    //Focus et blur sur les champs
    
    $("#nom, #prenom, #adresse, #cp, #ville, #tel, #email, #mdp, #confirmation").focus( function() {
        $(this).css("background", "#E0FFFF");
    })
    
    //Mot de passe intéractif
    
    $("#mdp").on("keyup", function() {
    
        if ($(this).val().length < 6) {
            $(this).css("border", "2px solid red");
        }
        else {
            $(this).css("border", "2px solid green")
        }
    })
    
    $("#confirmation").on("keyup", function() {
    
        if ($(this).val().length < 6 || $(this).val() !== $("#mdp").val()) {
            $(this).css("border", "2px solid red");
        }
        else {
            $(this).css("border", "2px solid green");
        }
    })
    
    //fonction de verification pour chaque input
    
    const patternString = /^[a-zA-Zéèêëîïôöàäâûü \'-]*$/;
    const patternNumber = /^[0-9]*$/;
    const patternAddress = /^[a-zA-Zéèêëîïôöàäâûü0-9 \'._-]*$/;
    const patternEmail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
    
    const verificationNom = () => {
        let nom = $("#nom").val();
    
        if (nom.length < 2) {
            $("#nom").css("border", "1px solid red");
            $(".erreur-nom").css("display", "block").css("color", "red").text("deux caractères minimum");
            return false
        }
        else if (!patternString.test(nom)) {
            $("#nom").css("border", "1px solid red");
            $(".erreur-nom").css("display", "block").css("color", "red").text("veuillez saisir correctement votre nom");
            return false
        }
        else {
            $("#nom").css("border", "none");
            $(".erreur-nom").css("display", "none")
            return true
        }
    }
    
    const verificationPrenom = () => {
        let prenom = $("#prenom").val();
    
        if (prenom.length < 2) {
            $("#prenom").css("border", "1px solid red");
            $(".erreur-prenom").css("display", "block").css("color", "red").text("deux caractères minimum");
            return false;
        }
        else if (!patternString.test(prenom)) {
            $("#prenom").css("border", "1px solid red");
            $(".erreur-prenom").css("display", "block").css("color", "red").text("veuillez saisir correctement votre prénom");
            return false;
        }
        else {
            $("#prenom").css("border", "none");
            $(".erreur-prenom").css("display", "none")
            return true
        }
    }
    
    const verificationAdresse = () => {
        let adresse = $("#adresse").val();
    
        if (adresse.length < 5) {
            $("#adresse").css("border", "1px solid red");
            $(".erreur-adresse").css("display", "block").css("color", "red").text("cinq caractères minimum");
            return false
        }
        else if (!patternAddress.test(adresse)) {
            $("#adresse").css("border", "1px solid red");
            $(".erreur-adresse").css("display", "block").css("color", "red").text("veuillez saisir une adresse valide");
            return false
        }
        else {
            $("#adresse").css("border", "none");
            $(".erreur-adresse").css("display", "none")
            return true
        } 
    }
    
    const verificationCp = () => {
        let cp = $("#cp").val();
    
        if ((cp.length != 5) || (!patternNumber.test(cp))) {
            $("#cp").css("border", "1px solid red");
            $(".erreur-cp").css("display", "block").css("color", "red").text("veuillez saisir un code postal valide");
            return false
        }
        else {
            $("#cp").css("border", "none");
            $(".erreur-cp").css("display", "none")
            return true
        }
    }
    
    const verificationVille = () => {
        let ville = $("#ville").val();
    
        if ((ville.length < 3) || (!patternString.test(ville))) {
            $("#ville").css("border", "1px solid red");
            $(".erreur-ville").css("display", "block").css("color", "red").text("veuillez saisir correctement votre ville");
            return false
        }
        else {
            $("#ville").css("border", "none");
            $(".erreur-ville").css("display", "none")
            return true
        }
    }
    
    const verificationTel = () => {
        let tel = $("#tel").val();
    
        if ((tel.length != 10) || (!patternNumber.test(tel))) {
            $("#tel").css("border", "1px solid red");
            $(".erreur-tel").css("display", "block").css("color", "red").text("veuillez saisir une numéro de téléphone valide");
            return false
        }
        else {
            $("#tel").css("border", "none");
            $(".erreur-tel").css("display", "none")
            return true
        }
    }
    
    const verificationEmail = () => {
        let email = $("#email").val();
    
        if (!patternEmail.test(email)) {
            $("#email").css("border", "1px solid red");
            $(".erreur-email").css("display", "block").css("color", "red").text("veuillez saisir une adresse email valide ");
            return false
        }
        else {
            $("#email").css("border", "none");
            $(".erreur-email").css("display", "none")
            return true
        }
    }
    
    const verificationMdp = () => {
        let mdp = $("#mdp").val();
    
        if (mdp.length < 6) {
            $("#mdp").css("border", "1px solid red");
            $(".erreur-mdp").css("display", "block").css("color", "red").text("six caractères minimum");
            return false
        }
        else {
            $("#mdp").css("border", "none");
            $(".erreur-mdp").css("display", "none")
            return true
        }
    }
    
    const confirmation = () => {
        let mdp = $("#mdp").val();
        let confirmation = $("#confirmation").val();
    
        if ( mdp !== confirmation) {
            $("#confirmation").css("border", "1px solid red");
            $(".erreur-confirmation").css("display", "block").css("color", "red").text("Les mots de passe doivent être identiques");
            return false
        }
        else {
            $("#confirmation").css("border", "none");
            $(".erreur-confirmation").css("display", "none")
            return true
        }
    }
    
    const verificationDispo = () => {
        let dispo = $("input[name='jour']:checked");
    
        if (dispo.length < 1) {
            $(".erreur-dispo").css("display", "block").css("color", "red").text("veuillez cocher au moins une option");
            return false
        }
        else {
            $(".erreur-dispo").css("display", "none");
            return true
        }
    }
    
    const verificationGenre = () => {
        let genre = $("input[name='genre']:checked");
    
        if (genre.length < 1) {
            $(".erreur-genre").css("display", "block").css("color", "red").text("choisir une option");
            return false
        }
        else {
            $(".erreur-genre").css("display", "none");
            return true
        }
    }
    
    const verificationPermis = () => {
        let permis = $("input[name='permis']:checked");
    
        if (permis.length < 1) {
            $(".erreur-permis").css("display", "block").css("color", "red").text("choisir une option");
            return false
        }
        else {
            $(".erreur-permis").css("display", "none");
            return true
        }
    }
    
    //Verification champ par champ
    
    $("#nom").focusout(function() {
        verificationNom();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#prenom").focusout(function() {
        verificationPrenom();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#adresse").focusout(function() {
        verificationAdresse();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#cp").focusout(function() {
        verificationCp();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#ville").focusout(function() {
        verificationVille();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#tel").focusout(function() {
        verificationTel();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#email").focusout(function() {
        verificationEmail();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#mdp").focusout(function() {
        verificationMdp();
        $(this).css("background", "#FFEFD5");
    })
    
    $("#confirmation").focusout(function() {
        confirmation();
        $(this).css("background", "#FFEFD5");
    })
    
    //Envoi du formulaire
    
    $(".benevole").submit(function() {
    
        verificationGenre();
        verificationPermis();
        verificationDispo();
    
        if( (verificationNom()) && (verificationPrenom()) && (verificationAdresse()) && (verificationCp()) && (verificationVille()) && (verificationTel()) && (verificationEmail()) && (verificationMdp()) && (confirmation()) && (verificationGenre()) && (verificationPermis()) && (verificationDispo())) {
            let valider = confirm("Etes-vous certain de vouloir soumettre le formulaire?");
            if (valider) {
                return true
            }
            else {
                return false
            }
        }
        else {
            alert("Veuillez remplir correctement le formulaire.");
            return false
        }
    })
    })