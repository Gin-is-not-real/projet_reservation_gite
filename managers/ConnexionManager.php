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
class AdminManager extends ConnexionManager {
    protected $tableadmin;

    function __construct($tableadmin) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }
    public function getUtilisateur($id) {
        try {
            $req = $this->dbBDO->query("SELECT * FROM $this->tableadmin WHERE id_utilisateur=" . $id);
        }
        catch (Exception $e) {
            die('erreur on list:' . $e->getMessage());
        }
        return $req;
    }
}


//////////////////////////////////////////////////////////// 
class HebergementManager extends ConnexionManager {
    protected $tablename;

    function __construct($hostname, $username, $password, $basename, $tablename) {
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

    public function getHebergements() {
        try {
            $req = $this->dbPDO->query("SELECT * FROM $this->tablename ORDER BY id_hebergement DESC");
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
    }

    public function getHebergementsWithFilter() {
        //ok si on a mis une valeur
        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';

        $str = "SELECT * FROM $this->tablename WHERE ";

        if(isset($_POST['categorie']) AND !empty($_POST['categorie'])) {
            $cat = $_POST['categorie'];
            $str .= "categorie LIKE '$cat' AND ";
        }
        if(isset($_POST['nbr-lits']) AND !empty($_POST['nbr-lits'])) {
            $nb_lits = $_POST['nbr-lits'];
            $str .= "nb_lits >= '$nb_lits' AND ";
        }
        if(isset($_POST['nbr-sdb']) AND !empty($_POST['nbr-sdb'])) {
            $nb_sdb = $_POST['nbr-sdb'];
            $str .= "nb_sdb >= '$nb_sdb' AND ";
        }
        if(isset($_POST['prix']) AND !empty($_POST['prix'])) {
            $prix = $_POST['prix'];
            $str .= "prix >= '$prix' AND ";
        }

        if(isset($_POST['photo']) AND !empty($_POST['photo'])) {
            $photo = $_POST['photo'];
            $str .= "photo >= '$photo' AND ";
        }



        $str = substr($str, 0, -4);

        try {
            //ok
            // $req = $this->dbPDO->query("SELECT * FROM $this->tablename WHERE categorie LIKE '$categorie' ");
            $req = $this->dbPDO->query($str);
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
    }
 
    public function addHebergement($data) {
        try {
            $req = $this->dbPDO->prepare("INSERT INTO $this->tablename (intitule, categorie, description, photo, nb_lits, nb_sdb, localisation, prix) VALUES (:intitule, :categorie, :description, :photo, :nb_lits, :nb_sdb, :localisation, :prix)");
            $reponse = $req->execute(array(
                "intitule" => $data['intitule'],
                "categorie" => $data['categorie'],
                "description" => $data['description'],
                "photo" => $data['photo'],
                "nb_lits" => $data['nbr_lits'],
                "nb_sdb" => $data['nbr_sdb'],
                "localisation" => $data['localisation'],
                "prix" => $data['prix']
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
            $req = $this->dbPDO->prepare("UPDATE $this->tablename SET intitule=:intitule, categorie=:categorie, description=:description, photo=:photo, nb_lits=:nb_lits, nb_sdb=:nb_sdb, localisation=:localisation, prix=:prix WHERE id_hebergement =$id"); 
            
            $reponse = $req->execute(array(
                "intitule" => $_POST['intitule'],
                "categorie" => $_POST['categorie'],
                "description" => $_POST['description'],
                "photo" => $_POST['photo'],
                "nb_lits" => $_POST['nb_lits'],
                "nb_sdb" => $_POST['nb_sdb'],
                "localisation" => $_POST['localisation'],
                "prix" => $_POST['prix']
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

    function __construct($hostname, $username, $password, $basename, $tablename) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }

    public function getReservationsById($id) {
        try {
            $req = $this->dbPDO->query("SELECT * FROM $this->tablename WHERE id_hebergement=" . $id);
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
    }

    public function getReservations() {
        try {
            $req = $this->dbPDO->query("SELECT * FROM $this->tablename ORDER BY id_hebergement DESC");
        }
        catch (Exception $e) {
            die('erreur on list: ' . $e->getMessage());
        }
        return $req;
    }

    public function addReservation($idHebergement, $dateOccupation, $dateLiberation, $clientMail) {
    // public function addReservation($data) {



        try {
            $req = $this->dbPDO->prepare("INSERT INTO $this->tablename (id_hebergement, date_occupation, date_liberation, client_mail) VALUES (:id_hebergement, :date_occupation, :date_liberation, :client_mail)");
            $reponse = $req->execute(array(
                "id_hebergement" => $idHebergement,
                "date_occupation" => $dateOccupation,
                "date_liberation" => $dateLiberation,
                "client_mail" => $clientMail
            ));

            // $req = $this->dbPDO->prepare("INSERT INTO $this->tablename (id_hebergement, date_occupation, date_liberation, client_mail) VALUES (:id_hebergement, :date_occupation, :date_liberation, :client_mail)");
            // $reponse = $req->execute(array(
            //     "id_hebergement" => $data['id_hebergement'],
            //     "date_occupation" => $data['date_occupation'],
            //     "date_liberation" => $data['date_liberation'],
            //     "client_mail" => $data['client_mail']
            // ));
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
            $req = $this->dbPDO->prepare("UPDATE $this->tablename SET id_hebergement=:id_hebergement, date_occupation=:date_occupation, date_liberation=:date_liberation, client_mail=:client_mail "); 
            
            $reponse = $req->execute(array(
                "id_hebergement" => $_POST['id_hebergement'],
                "date_occupation" => $_POST['date_occupation'],
                "date_liberation" => $_POST['date_liberation'],
                "client_mail" => $_POST['client_mail'],
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


