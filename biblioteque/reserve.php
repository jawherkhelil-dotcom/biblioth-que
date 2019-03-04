<?php

class reserve {
    private $id;
    private $id_util;
    private $id_livre1;
    private $id_livre2;
    
    public function __construct($id_util,$id_livre1,$id_livre2) {
        $this->id_util=$id_util;
        $this->id_livre1=$id_livre1;
        $this->id_livre2=$id_livre2;
    }
    
     public function ajouter() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "insert into reserve(id_util,id_livre1,id_livre2)"
                . " values($this->id_util,$this->id_livre1,$this->id_livre2)";
        $con->query($req);
    }

     public static function getreserve() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from reserve";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }

    public static function supprimer($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "delete from reserve where id=$id";
        $con->query($req);
    }
    
       public static function getreserveByid($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from reserve where id_util=$id";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }
    
    function getId_util() {
        return $this->id_util;
    }

    function getId_livre1() {
        return $this->id_livre1;
    }

    function getId_livre2() {
        return $this->id_livre2;
    }
}