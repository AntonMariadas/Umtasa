<?php

class Update {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Mettre à jour le profil d'un distributeur
    public function distributeur($genre, $nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $permis, $dispo, $id) {
        $sql = $this->db->prepare('UPDATE users SET sexe=?, nom=?, prenom=?, adresse=?, cp=?, ville=?, tel=?, email=?, mdp=?, permis=?, dispo=? WHERE id_user=?');
        $result = $sql->execute(array($genre, $nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $permis, $dispo, $id));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    } 

    //Mettre à jour le profil d'une cuisiniere
    public function cuisiniere($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $id) {
        $sql = $this->db->prepare('UPDATE users SET nom=?, prenom=?, adresse=?, cp=?, ville=?, tel=?, email=?, mdp=? WHERE id_user=?');
        $result = $sql->execute(array($nom, $prenom, $adresse, $cp, $ville, $tel, $email, $mdp, $id));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }
} 