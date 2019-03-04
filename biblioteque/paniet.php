<?php

class paniet {
    private $id;
    private $id_livre;
    private $mdp;
    
    public function __construct($id_livre) {
        $this->id_livre=$id_livre;
    }
    
     public function ajouter() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "insert into paniet(id_livre) values($this->id_livre)";
        $con->query($req);
    }

     public static function getpaniet() {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from paniet";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }

    public function supprimer($id) {
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "delete from paniet where id=$id";
        $con->query($req);
    }
    
    public static function count(){
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from paniet";
        $stmt=$con ->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count=0;
        foreach ($liste as $log) {
                if ($log['id'] > 0){
                    $count=$count+1;
                }
            }
            return $count;
    }
    
        public static function supprimer_tous(){
        $con = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
        $req = "select * from paniet";
        $stmt = $con->query($req);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($liste as $pan) {
            $id=$pan['id'];
            $req1 = "delete from paniet where id=$id";
            $con->query($req1);
        }
    }
}