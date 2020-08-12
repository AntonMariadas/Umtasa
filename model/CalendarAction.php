<?php

class CalendarAction {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Réserver une journée
    public function reserver($journee, $id) {
        $sql = $this->db->prepare('INSERT INTO calendrier(journee, id_user) VALUES (?,?)');
        $result = $sql->execute(array($journee, $id));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }

    //Annuler une journée
    public function annuler($journee, $id) {
        $sql = $this->db->prepare('DELETE FROM calendrier WHERE journee=? AND id_user=?');
        $result = $sql->execute(array($journee, $id));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    }

    //Vérifier si une journée est réservée
    public function verificationReservation($journee) {
        $sql = $this->db->prepare('SELECT * FROM calendrier WHERE journee=?');
        $sql->execute(array($journee));
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    //Afficher les réservations en fonction de la cuisinière
    public function afficherReservation($id) {
        $sqlBooked = $this->db->prepare('SELECT *, DATE_FORMAT(journee, "%d-%m-%Y") AS dates FROM calendrier WHERE id_user=?');
        $sqlBooked->execute(array($id));
        return $sqlBooked;
    }

    //Afficher le calendrier
    public function afficherCalendrier() {
        $sqlCal = $this->db->query('SELECT *, DATE_FORMAT(journee, "%d-%m-%Y") AS dates FROM calendrier INNER JOIN users ON calendrier.id_user = users.id_user');
        return $sqlCal;
    }

    //Afficher tous les jours réservés
    public function afficherCalendrierJour($journee) {
        $sqlCalJour = $this->db->query('SELECT *, DATE_FORMAT(journee, "%d-%m-%Y") AS dates FROM calendrier INNER JOIN users ON calendrier.id_user = users.id_user WHERE DAYOFWEEK(journee) ='.$journee.'');
        return $sqlCalJour;
    }
}