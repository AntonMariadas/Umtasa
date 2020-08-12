<?php

class Equipe {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Inscrire un distributeur dans une équipe
    public function ajoutEquipe($jour, $id) {
        $sql = $this->db->prepare('INSERT INTO equipe_'.$jour.'(id_user) VALUES (?)');
        $result = $sql->execute(array($id));
        if ($result) {
            $this->db = null;
            return true;
        }
        else {
            return false;
        }
    } 

    //Supprimer un distributeur d'une equipe
    public function deleteEquipe($jour, $id) {
        $sql = $this->db->prepare('DELETE FROM equipe_'.$jour.' WHERE id_equipe_'.$jour.'=?');
        $result = $sql->execute(array($id));
        if ($result) {
            $this->db = null;
        }
    }

    //Afficher les membres de l'équipe
    public function membreEquipe($jour) {
        $sqlMembre = $this->db->query('SELECT * from equipe_'.$jour.' INNER JOIN users ON users.id_user = equipe_'.$jour.'.id_user');
        return $sqlMembre;
    }
}