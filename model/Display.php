<?php

class Display {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Afficher tous les distributeurs
    public function distributeurs() {
        $sqlD = $this->db->query('SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role WHERE role="distributeur" ORDER BY nom');
        return $sqlD;
    }

    //Afficher un distributeur
    public function distributeur($id) {
        $sql = $this->db->prepare("SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role  WHERE id_user=?");
        $sql->execute(array($id));
        $distributeur = $sql->fetch(PDO::FETCH_OBJ);
        $this->db = null;
        return $distributeur;
    }

    //Afficher la disponibilité des distributeurs
    public function distributeursDispo($jour) {
        $sqlDdispo = $this->db->prepare("SELECT * FROM users WHERE dispo=?");
        $sqlDdispo->execute(array($jour));
        return $sqlDdispo;

    }

    //Afficher toutes les cuisiniere
    public function cuisinieres() {
        $sqlC = $this->db->query('SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role WHERE role="cuisiniere" ORDER BY nom');
        return $sqlC;
    }

    //Afficher une cuisiniere
    public function cuisiniere($id) {
        $sql = $this->db->prepare("SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role  WHERE id_user=?");
        $sql->execute(array($id));
        $cuisiniere = $sql->fetch(PDO::FETCH_OBJ);
        $this->db = null;
        return $cuisiniere;
    }

    //Afficher tous les messages
    public function messages() {
        $sqlM = $this->db->query('SELECT *, DATE_FORMAT(dateMessage, "%d-%m-%Y %H:%i") AS dates FROM messages ORDER BY id_message DESC');
        return $sqlM;
        
    }

    //Afficher un message envoyé par un membre
    public function message($id) {
        $sql = $this->db->prepare('SELECT * FROM messages WHERE id_message=?');
        $sql->execute(array($id));
        $message = $sql->fetch(PDO::FETCH_OBJ);
        $this->db = null;
        return $message;
    }

    //Vérifier si le membre est un admin ou non
    public function verificationAdmin($id) {
        $sqlD = $this->db->prepare('SELECT * FROM users INNER JOIN roles ON users.id_role = roles.id_role WHERE id_user=?');
        $sqlD->execute(array($id));
        $result = $sqlD->fetch(PDO::FETCH_OBJ);
        if ($result->role == 'admin') {
            $this->db = null;
            return true;
        } else {
            $this->db = null;
            return false;
        }
    }
}