<?php

class Connection {

    public $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    //S'authentifier
    public function login($email, $mdp) {
        $sql = $this->db->prepare("SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role  WHERE email=?");
        $sql->execute(array($email));
        $user = $sql->fetch(PDO::FETCH_OBJ);
        $this->db = null;

        if (isset($user->email)) {

            if (password_verify($mdp, $user->mdp)) {
                if (!isset($_SESSION['token'])) {
                    $_SESSION['token'] = sha1(time() * rand(0, 100));
                }
                $_SESSION['role'] = $user->role;
                $_SESSION['id'] = $user->id_user;
                if ($user->role == 'admin') {
                    header("Location: index.php?page=admin&onglet=logo&id=".$_SESSION['id']."&token=".$_SESSION['token']);
                    exit;
                }
                else if ($user->role == 'distributeur') {
                    header("Location: index.php?page=profil-distributeur&onglet=logo&id=".$_SESSION['id']."&token=".$_SESSION['token']);
                    exit;
                }
                else if ($user->role == 'cuisiniere') {
                    header("Location: index.php?page=profil-cuisiniere&onglet=logo&id=".$_SESSION['id']."&token=".$_SESSION['token']);
                    exit;
                }
            }
            else {
            ?>
            <script>alert("Vérifier votre mot de passe.")</script>
            <?php
            return false;
            }
        }  
        else {
            ?>
            <script>alert("Vérifier votre adresse email.")</script>
            <?php
            return false;
        }
    }  
}