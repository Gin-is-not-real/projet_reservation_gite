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
}
catch (Exception $e) {
    die('erreur on index: ' . $e->getMessage() );
}
