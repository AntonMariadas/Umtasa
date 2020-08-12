<?php

class Register {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }


    //Inscrire un distributeur
    public function distributeur($genre, $nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $permis, $dispo) {
        $sql = $this->db->prepare('INSERT INTO users(sexe, nom, prenom, adresse, cp, ville, tel, email, mdp, permis, dispo, id_role) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
        $result = $sql->execute(array($genre, $nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $permis, $dispo, 2));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }

    //Inscrire une cuisinière
    public function cuisiniere($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp) {
        $sql = $this->db->prepare('INSERT INTO users(nom, prenom, adresse, cp, ville, tel, email, mdp, id_role) VALUES (?,?,?,?,?,?,?,?,?)');
        $result = $sql->execute(array($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, 3));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }

    //Enregistrer un message
    public function message($nom, $prenom, $tel, $email, $sujet, $msg) {
        $sql = $this->db->prepare('INSERT INTO messages(nom, prenom, tel, email, sujet, msg) VALUES (?,?,?,?,?,?)');
        $result = $sql->execute(array($nom, $prenom, $tel, $email, $sujet, $msg));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }
}