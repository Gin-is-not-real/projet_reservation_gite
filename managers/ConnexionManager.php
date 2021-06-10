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
//////////////////////////////////////////////////////////// 
class  HebergementManager extends ConnexionManager {
    protected $tablename;

    function __construct($hostname, $username, $password, $basename,$tablename) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }
    
    public function getHebergement($id) {
        try {
            $req = $this->dbPDO->query("SELECT * FROM $this->tablename WHERE id_hebergement=" . $id);
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
    }

    public function listHebergements() {
        try {
            $req = $this->dbPDO->query('SELECT * FROM $this->tablename ORDER BY id_hebergement DESC');
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
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
                "intitule" => $_POST['intitule'],
                "categorie" => $_POST['categorie'],
                "description" => $_POST['description'],
                "photo" => $_POST['photo'],
                "nb_lits" => $_POST['nbLits'],
                "nb_sdb" => $_POST['nbSdb'],
                "localisation" => $_POST['localisation'],
                "prix" => $_POST['prix'],
                "disponibilite" => $_POST['disponibilite']
            ));
        }
        catch (Exception $e) {
            die('erreur on update: ' . $e->getMessage() );
        }
    }

    public function getTablename() {
        return $this->tablename;
    }
    public function setTablename() {
        $this->tablename=$tablename;
    }
}

//////////////////////////////////////////////////////////// 
class ReservationsManager extends ConnexionManager {
    protected $tablename;

    function __construct($hostname, $username, $password, $basename,$tablename) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }

    public function addReservations($idHebergement, $dateOccupation, $dateLiberation) {
        try {
            $req = $this->dbPDO->prepare("INSERT INTO $this->tablename (id_hebergement, date_occupation, date_liberation) VALUES (:id_hebergement, :date_occupation, :date_liberation)");
            $reponse = $req->execute(array(
                "id_hebergement" => $idHebergement,
                "date_occupation" => $dateOccupation,
                "date_liberation" => $dateLiberation,
               
            ));
        }
        catch (Exception $e) {
            die('erreur on add: ' . $e->getMessage() );
        }
        return $reponse; 
    }

    public function deleteReservations($idReservation) {
        $this->dbPDO->exec("DELETE FROM $this->tablename WHERE id_reservation=" . $idReservation);
    }

    public function updateReservations($idReservation) {
        try {
            $req = $this->dbPDO->prepare("UPDATE $this->tablename SET id_hebergement=:id_hebergement, date_occupation=:date_occupation, date_liberation=:date_liberation "); 
            
            $reponse = $req->execute(array(
                "id_hebergement" => $_POST['id_hebergement'],
                "date_occupation" => $_POST['date_occupation'],
                "date_liberation" => $_POST['date_liberation'],
                
            ));
        }
        catch (Exception $e) {
            die('erreur on update: ' . $e->getMessage() );
        }
    }

    public function getTablenameresa() {
        return $this->tablename;
    }
    public function setTablenameresa() {
        $this->tablename=$tablename;
    }
}


