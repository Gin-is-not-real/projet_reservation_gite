<?php 
class Hebergement {
    private $id;
    private $intitule;
    private $categorie;
    private $description;
    private $photo;                                                                             
    private $nb_lits;
    private $nb_sdb;
    private $localisation;
    private $prix;
    
    public function __construct($values) {
        $this->id = $values['id_hebergement'];
        $this->intitule = $values['intitule'];
        $this->categorie = $values['categorie'];
        $this->description = $values['description'];
        $this->nb_lits = $values['nb_lits'];
        $this->nb_sdb = $values['nb_sdb'];
        $this->localisation = $values['localisation'];
        $this->prix = $values['prix'];
        $this->photo = $values['photo'];
    }

    public function describe() {
        echo 'id: ' . $this->id . ', intitulé: ' . $this->intitule . ', categorie: ' . $this->categorie . ' description: ' . $this->nb_lits . '<br>';
    }

    //GETTERS
    public function getId() {
        return $this->id;
    }
    public function getIntitule() {
        return $this->intitule;
    }
    public function getCategorie() {
        return $this->categorie;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getNbLits() {
        return $this->nb_lits;
    }
    public function getNbSdb() {
        return $this->nb_sdb;
    }
    public function getLocalisation() {
        return $this->localisation;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getPhoto() {
        return $this->photo;
    }

    //SETTERS
    public function setId($id) {
        $this->id=$id;
    }
    public function setIntitule($intitule) {
        $this->intitule=$intitule;
    }
    public function setCategorie($categorie) {
        $this->categorie=$categorie;
    }
    public function setDescription($description) {
        $this->description=$description;
    }
    public function setNbLits($nb_lits) {
        $this->nb_lits=$nb_lits;
    }
    public function setNbSdb($nb_sdb) {
        $this->nb_sdb=$nb_sdb;
    }
    public function setLocalisation($localisation) {
        $this->localisation=$localisation;
    }
    public function setPrix($prix) {
        $this->prix=$prix;
    }
    public function setPhoto($photo) {
        $this->photo=$photo;
    }
}
    