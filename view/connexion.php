<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   

    

</head>
<body>
<form action="connexion.php?action=connexion" method="post">


        <input  type="text" name="nom" placeholder="Nom" required>
            <br> <br>


        <input type="password" name="mdp" placeholder="Mot de passe" required>
            <br> <br>    
            
            <br> <input type="submit" name="btn" value="Connexion">

    <?php


          $nom='NinaAlice';
          $mdp='1234';
          
          if(isset($_GET['action']) && $_GET['action']== 'connexion' ) {
           
             if($_POST['nom'] == 'NinaAlice' && $_POST['mdp'] == '1234')
            {
                $_SESSION['acces']="oui";
                // header('location:adminView.php');
                header('Location:../index.php?action=to-admin');
            }
            else {
                echo "<p class='afficher'> connexion impossible </p>";
            }
          }
       
        
        
?>
</form>
</body>
</html>