<?php

class ConnexionManager {
    protected $hostname;
    protected $username;
    protected $password;
    protected $basename;
    public $dbPDO;

    public function __construct($hostname, $username, $password, $basename) {
        $this->hostname=$hostname;
        $this->username=$username;
        $this->password=$password;
        $this->basename=$basename;
        $this->dbPDO=$this->connectbase();
    }

    protected function connectBase() {
        try {
            $db= new PDO("mysql:host=$this->hostname;dbname=$this->basename",$this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db; 
        }
        catch(PDOException $e) {
            echo 'connexion failed:' . $e->getMessage();
            }
        
    }

    public function getHostname() {
        return $this->hostname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getbasename() {
        return $this->getbasename;
    }

    public function setHostname() {
        $this->hostname=$hostname;
    }

    public function setUsername() {
        $this->username=$username;
    }

    public function setPassword() {
        $this->password=$password;
    }

    public function setbasename() {
        $this->basename=$basename;
    }
}

class  HebergementManager extends ConnexionManager {
    protected $tablename;

    function __construct($hostname, $username, $password, $basename,$tablename) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }
    public function getTablename() {
        return $this->tablename;
    }

    public function setTablename() {
        $this->tablename=$tablename;
    }

    public function addHebergement($intitule, $categorie, $description, $photo, $nbLits, $nbSdb, $localisation, $prix, $disponibilite) {
        try {
            $req = $this->dbPDO->prepare("INSERT INTO $this->tablename (intitule, categorie, description, photo, nb_lits, nb_sdb, localisation, prix, disponibilite) VALUES (:intitule, :categorie, :description, :photo, :nb_lits, :nb_sdb, :localisation, :prix, :disponibilite)");
            $reponse = $req->execute(array(
                "intitule" => $intitule,
                "categorie" => $categorie,
                "description" => $description,
                "photo" => $photo,
                "nb_lits" => $nbLits,
                "nb_sdb" => $nbSdb,
                "localisation" => $localisation,
                "prix" => $prix,
                "disponibilite" => $disponibilite
            ));
        }
        catch (Exception $e) {
            die('erreur on add: ' . $e->getMessage() );
        }
        return $reponse; 
    }

    public function deleteHebergement($id) {
        $this->dbPDO->exec("DELETE FROM $this->tablename WHERE id_hebergement=" . $id);
    }

    public function updateHebergement($id) {
        try {
            $req = $this->dbPDO->prepare("UPDATE $this->tablename SET intitule=:intitule, categorie=:categorie, description=:description, photo=:photo, nb_lits=:nb_lits, nb_sdb=:nb_sdb, localisation=:localisation, prix=:prix, disponibilite=:disponibilite WHERE id_hebergement =$id"); 
            
            $reponse = $req->execute(array(
                "intitule" => $intitule,
                "categorie" => $categorie,
                "description" => $description,
                "photo" => $photo,
                "nb_lits" => $nbLits,
                "nb_sdb" => $nbSdb,
                "localisation" => $localisation,
                "prix" => $prix,
                "disponibilite" => $disponibilite
            ));
        }
        catch (Exception $e) {
            die('erreur on update: ' . $e->getMessage() );
        }
    }







}