<?php

class livre {
    private $id;
    private $nom;
    private $auteur;
    
    public function __construct($nom,$auteur) {
        $this->nom=$nom;
        $this->auteur=$auteur;
    }
    
     public function ajouter() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "insert into livre(nom,auteur) values('$this->nom','$this->auteur')";
        $con->query($req);
    }

     public static function getlivre() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from livre";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }
    
    public static function getlivreByid($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from livre where id=$id";
        $stmt = $con->query($req);
        $tab = $stmt->fetch(PDO::FETCH_ASSOC);


        $obj = new livre($tab['nom'], $tab['auteur']);
        return $obj;
    }

    public static function supprimer($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "delete from livre where id=$id";
        $con->query($req);
    }

    public static function modifier($nom,$auteur,$id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "update livre set nom='$nom', auteur='$auteur' where id=$id";
        $con->query($req);
    }
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAuteur() {
        return $this->auteur;
    }
}