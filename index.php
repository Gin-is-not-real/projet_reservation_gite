<?php
require "managers/ConnexionManager.php";

$GLOBALS["hostname"]= "localhost";
$GLOBALS["username"]= "root";
$GLOBALS["password"]= '';
$GLOBALS["basename"]= "projet_gites";
$GLOBALS["tablename"]= "hebergements";
$GLOBALS["tablenameresa"]= "reservations";

$manager= new HebergementManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablename"]);
$resaManager= new ReservationsManager($GLOBALS["hostname"] , $GLOBALS["username"] , $GLOBALS["password"] , $GLOBALS["basename"] , $GLOBALS["tablenameresa"]);

try {
    if(!isset($_GET["action"])) {
          require_once("view/homeView.php");
    }
    else {
        if($_GET['action'] == 'to-admin') {
            require_once("view/adminView.php");
        }

        if($_GET['action'] == 'ajouter') {
            //
            echo 'Les valeurs suivantes ont été ajoutées: ';
            foreach ($_POST as $key => $value) {
                echo  $key . ': ' . $value;
            }

            $manager->addHebergement($_POST);
            require_once("view/adminView.php");
        }

        if($_GET['action'] == 'modifier') {
            echo $_GET['id'];

            $manager->updateHebergement($_GET['id']);
            //
            // echo 'Les valeurs suivantes ont été modifiées: ';
            // foreach ($_POST as $key => $value) {
            //     echo  $key . ': ' . $value;
            // }
            // $manager->addHebergement($_POST);
            // require_once("view/adminView.php");
        }
    }
}
catch (Exception $e) {
    die('erreur on index: ' . $e->getMessage() );
}
