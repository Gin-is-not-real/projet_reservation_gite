<?php
require "managers/ConnexionManager.php";

$GLOBALS["hostname"]= "localhost";
$GLOBALS["username"]= "root";
$GLOBALS["password"]= '';
$GLOBALS["basename"]= "projet_gites";
$GLOBALS["tablename"]= "hebergements";

$manager= new HebergementManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablename"]);


/////////////////////////////////////////////////////////////////
//TEST
echo $manager->getTablename();

//AJOUT
$intitule= "titre";
$categorie= "maison";
$description= "caca";
$photo = "photo";
$nbLits= 2;
$nbSdb= 2;
$localisation="nevers";
$prix= 10;
$disponibilite=true;

$manager->addHebergement($intitule, $categorie, $description, $photo, $nbLits, $nbSdb, $localisation, $prix, $disponibilite);

 //DELETE
//  $manager->deleteHebergement(2);

//UPDATE
$_POST['intitule']= "titre";
$_POST['categorie']= "maison";
$_POST['description']= "nouvelle description";
$_POST['photo']= "photo";
$_POST['nbLits']= 2;
$_POST['nbSdb']= 2;
$_POST['localisation']="nevers";
$_POST['prix']= 10;
$_POST['disponibilite']= true;

$manager->updateHebergement(2);