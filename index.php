

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
            // require_once("view/connexion.php");
            

        }

        else if($_GET['action'] == 'ajouter') {
            //
            echo 'Les valeurs suivantes ont été ajoutées: ';
            foreach ($_POST as $key => $value) {
                echo  $key . ': ' . $value;
            }

            $manager->addHebergement($_POST);
            require_once("view/adminView.php");
        }

        else if($_GET['action'] == 'modifier') {
            $manager->updateHebergement($_GET['id']);
            
            echo 'Les valeurs suivantes ont été modifiées: ';
            foreach ($_POST as $key => $value) {
                echo  $key . ': ' . $value;
            }
            require_once("view/adminView.php");
        }

        else if($_GET['action'] == 'supprimer') {
            echo 'L\'entrée n ' . $_GET['id'] . ' à bien été supprimée';

            $manager->deleteHebergement($_GET['id']);
            require_once("view/adminView.php");
        }

        else if($_GET['action'] == 'add-resa') {
            $subject = 'confirmation de reservation';
            $message = 'Nous vous confirmons votre réservation pour le logement n° ' . $_GET['id'] . ' du ' . $_POST['calendar-depart'] . ' au ' . $_POST['calendar-arrivee'];
            mail($_POST['user-mail'], $subject, $message);

            $resaManager->addReservation($_GET['id'], $_POST['calendar-depart'], $_POST['calendar-arrivee'], $_POST['user-mail']);

            header('Location: index.php');
        }

        else if($_GET['action'] == 'filter') {
            // print_r($_POST);
            // echo '<br>';
            // $req = $manager->getHebergementsWithFilter();
            // print_r($req);
            $_GET['filter'] = 'true';

            require_once("view/homeView.php");
            // header('Location: index.php#main-section');
        }

    }
}
catch (Exception $e) {
    die('erreur on index: ' . $e->getMessage() );
}


