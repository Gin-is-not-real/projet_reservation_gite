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
    private $disponibilite;
    
    public function __construct($id, $intitule, $categorie, $description, $photo, $nb_lits, $nb_sdb, $localisation, $prix, $disponibilite) {
        $this->id = $id;
        $this->intitule = $intitule;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->nb_lits = $nb_lits;
        $this->nb_sdb = $nb_sdb;
        $this->localisation = $localisation;
        $this->prix = $prix;
        $this->disponibilite = $disponibilite;
    }

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

    public function getDisponibilite() {
        return $this->disponibilite;
    }

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

    public function setDisponibilite($disponibilite) {
        $this->disponibilite=$disponibilite;
    }
}
    