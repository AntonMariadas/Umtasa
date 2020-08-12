<?php

class Check {

    //Contrôler le nom, prénom et la ville
    public function checkNom($string) {
        if ((preg_match('#^[a-zA-Zéèêëîïôöàäâûü \'-]+$#', $string)) && (strlen($string) > 1)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Contrôler l'adresse
    public function checkAdresse($string) {
        if ((preg_match('#^[a-zA-Zéèêëîïôöàäâûü0-9 \'._-]+$#', $string)) && (strlen($string) > 4)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Contrôler le code postal
    public function checkCp($number) {
        if ((preg_match('#^[0-9]+$#', $number)) && (strlen($number) == 5)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Contrôler le téléphone
    public function checkTel($number) {
        if ((preg_match('#^[0-9]+$#', $number)) && (strlen($number) == 10)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Contrôler l'adresse mail
    public function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Contrôler les mots de passe
    public function checkMdp($mdp, $confirmation) {
        if ((strlen($mdp) > 5) && ($mdp == $confirmation)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Valider les contrôles sur les formulaires d'inscription et de modification
    public function validate($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $confirmation) {
        if (($this->checkNom($nom)) && ($this->checkNom($prenom)) && ($this->checkAdresse($adresse)) && ($this->checkCp($cp)) && ($this->checkNom($ville)) && ($this->checkTel($tel)) && ($this->checkEmail($email)) && ($this->checkMdp($mdp,$confirmation))) {
            return true;
        }
        else {
            return false;
        }
    }

    //Valider les contrôles sur le formulaire de contact
    public function validateMessage($nom, $prenom, $tel, $email) {
        if (($this->checkNom($nom)) && ($this->checkNom($prenom)) && ($this->checkTel($tel)) && ($this->checkEmail($email))) {
            return true;
        }
        else {
            return false;
        }
    }
}
