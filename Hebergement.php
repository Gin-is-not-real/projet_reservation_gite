<?php 

class Hebergement {
    public $id;
    public $intitule;
    public $categorie;
    public $description;
    public $photo;
    public $nb_lits;
    public $nb_sdb;
    public $localisation;
    public $prix;
    public $disponibilite;
    
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
}
