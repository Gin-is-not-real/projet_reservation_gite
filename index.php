<?php
require "managers/ConnexionManager.php";

$GLOBALS["hostname"]= "localhost";
$GLOBALS["username"]= "root";
$GLOBALS["password"]= '';
$GLOBALS["basename"]= "projet_gites";
$GLOBALS["tablename"]= "hebergements";

$manager= new HebergementManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablename"]);


echo $manager->getTablename();

 
//  $intitule= "titre";
//  $categorie= "maison";
//  $description= "caca";
//  $photo= "...";                                                                             
//  $nbLits= 2;
//  $nbSdb= 2;
//  $localisation="nevers";
//  $prix= 10;
 $disponibilite=true;

//  $manager->addHebergement($intitule, $categorie, $description, $photo, $nbLits, $nbSdb, $localisation, $prix, $disponibilite);
//  $manager->deleteHebergement(2);
  $manager->updateHebergement(2);