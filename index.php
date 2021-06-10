<?php
require "managers/ConnexionManager.php";

$GLOBALS["hostname"]= "localhost";
$GLOBALS["username"]= "root";
$GLOBALS["password"]= '';
$GLOBALS["basename"]= "projet_gites";
$GLOBALS["tablename"]= "hebergements";
$GLOBALS["tablenameresa"]= "reservations";

$manager= new HebergementManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablename"]);


/////////////////////////////////////////////////////////////////
//TEST
echo $manager->getTablename();

<<<<<<< HEAD
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
=======
 
 $intitule= "titre";
 $categorie= "maison";
 $description= "caca";
 $photo= "...";                                                                             
 $nbLits= 2;
 $nbSdb= 2;
 $localisation="nevers";
 $prix= 10;
 $disponibilite=true;

 $manager->addHebergement($intitule, $categorie, $description, $photo, $nbLits, $nbSdb, $localisation, $prix, $disponibilite);

 $manager->deleteHebergement(2);

$_POST['intitule']="titre";
$_POST['categorie']="maison";
$_POST['description']="nouvelle description";
$_POST['photo']="photo";
$_POST['nbLits']=2;
$_POST['nbSdb']=2;
$_POST['localisation']="nevers";
$_POST['prix']=10;
$_POST['disponibilite']=true;


$manager->updateHebergement(2);

$manager= new ReservationsManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablenameresa"]);


echo $manager->getTablenameresa();

 
 $idHebergement=3;
 $dateOccupation= "2021-06-15";
 $dateLiberation= "2021-06-30";                                                                             
 

 $manager->addReservations($idHebergement, $dateOccupation, $dateLiberation);
 
 $manager->deleteReservations(6);

$_POST['id_hebergement']=3;
$_POST['date_occupation']="2021-06-20";
$_POST['date_liberation']="2021-06-30";



$manager->updateReservations(10);

>>>>>>> e938f7e446f95e948f1eb1d39817265ded3dcf46
