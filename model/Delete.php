<?php

class Delete {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Supprimer un bénévole
    public function benevole($id) {
        $sql = $this->db->prepare('DELETE FROM users WHERE id_user=?');
        $result = $sql->execute(array($id));
        if ($result) {
            $this->db = null;
        }
    }

    //Supprimer un message
    public function message($id_message) {
        $sql = $this->db->prepare('DELETE FROM messages WHERE id_message=?');
        $result = $sql->execute(array($id_message));
        if ($result) {
            $this->db = null;
        }
        
    }
}