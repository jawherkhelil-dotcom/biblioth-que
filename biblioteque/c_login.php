<?php

class login {
    private $id;
    private $login;
    private $mdp;
    
    public function __construct($login,$mdp) {
        $this->login=$login;
        $this->mdp=$mdp;
    }
    
     public function ajouter() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "insert into admin(login,mdp) values('$this->login','$this->mdp')";
        $con->query($req);
    }

     public static function getlogin() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from admin";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }
    
    public static function getloginBycode($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from admin where id=$id";
        $stmt = $con->query($req);
        $tab = $stmt->fetch(PDO::FETCH_ASSOC);


        $obj = new login($tab['login'], $tab['mdp']);
        return $obj;
    }

    public static function supprimer($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "delete from admin where id=$id";
        $con->query($req);
    }

    public function modifier($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "update admin set login='$this->login', mdp='$this->mdp' where id=$id";
        $con->query($req);
    }
    
    public function verif(){
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from admin where login='$this->login' and mdp='$this->mdp'";
        $stmt=$con ->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count=0;
        $i=0;
        foreach ($liste as $log) {
                if ($this->login == $log['login'] & $this->mdp == $log['mdp']){
                    $count=$count+1;
                    $i=$log['id'];
                }
            }
        if ($count==1){
                       header ('location:index_admin.php');
        }
        else {
              header ('location:erreur_login.php');
        }
    }
    function getId() {
        return $this->id;
    }
function getnom() {
        return $this->login;
    }
    function getMdp() {
        return $this->mdp;
    }


}