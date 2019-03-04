<?php

class client {
    private $cin;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    
    public function __construct($cin,$nom,$prenom,$login,$mdp) {
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->login=$login;
        $this->mdp=$mdp;
    }
    
     public function ajouter() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "insert into util(cin,nom,prenom,login,mdp)"
                . " values($this->cin,'$this->nom','$this->prenom','$this->login','$this->mdp')";
        $con->query($req);
    }

     public static function getclient() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from util";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }

    public static function supprimer($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "delete from util where id=$id";
        $con->query($req);
    }
    
    public function verif(){
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from util where login='$this->login' and mdp ='$this->mdp'";
        $stmt=$con ->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count=0;
        $i=1;
        foreach ($liste as $log) {
                if ($this->login == $log['login'] & $this->mdp == $log['mdp']){
                    $count=$count+1;
                    $i=$log['id'];
                }
            }
        if ($count==1){
                       header ('location:index_util.php?ii='.$i);
        }
        else {
              header ('location:erreur_login.php');
        }
    }
    
    function getCin() {
        return $this->cin;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }
}