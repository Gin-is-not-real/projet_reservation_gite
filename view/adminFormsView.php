 
 <?php
require_once 'classes/Hebergement.php';
?>
 
<?php
session_start();

if(!isset($_SESSION['acces']))
header('Location:view/connexion.php');
?> 

    
    <header>
        <h3>Modifier, Supprimer</h3>
    </header>

<?php
    $heb = $manager->getHebergements();
    while($data = $heb->fetch()) {
        $hebergement = new Hebergement($data);
?>
 
<section id="admin-edit-section">
    <header>
        <h3><?= $hebergement->getIntitule(); ?></h3>
    </header>

        <form class="form-admin-edit" id="form-edit-<?= $hebergement->getId(); ?>" action="index.php?action=modifier&id=<?= $hebergement->getId(); ?>"  method="post">
            <div class="form-admin-content">
                <div>
                    <label for="intitule">intitule</label>
                    <input type="text" name="intitule" id="" value=<?= $hebergement->getIntitule(); ?>>
                </div>
        
                <div>
                    <label for="categorie">categorie</label>
        
                    <select name="categorie">
                        <option value=""><?= $hebergement->getCategorie(); ?> </option>
                        <option value="Chambre"> Chambre </option>
                        <option value="Appartement"> Appartement </option>
                        <option value="Maison"> Maison </option>
                        <option value="Villa"> Villa </option>
                    </select>
                </div>
        
                <div>
                    <label for="localisation">localisation</label>
                    <input type="text" name="localisation" value=<?= $hebergement->getLocalisation(); ?>>
                </div>
        
                <div>
                    <label for="photo">photo</label>
                    <input type="text" name="photo" value=<?= $hebergement->getPhoto(); ?>>
                </div>
        
                <div>
                    <label for="description">description</label>
                    <!-- <input type="text" name="description" value="<?= $hebergement->getDescription(); ?>"> -->
                    <textarea name="description"><?= $hebergement->getDescription(); ?></textarea>

                </div>
        
                <div>
                    <label for="nb_lits">nb_lits</label>
                    <input type="number" name="nb_lits" value="<?= $hebergement->getNbLits(); ?>">
                </div>
        
                <div>
                    <label for="nb_sdb">nb_sdb</label>
                    <input type="number" name="nb_sdb" value="<?= $hebergement->getNbSdb(); ?>">
                </div>
        
                <div>
                    <label for="prix">prix</label>
                    <input type="number" name="prix" value="<?= $hebergement->getPrix(); ?>" >
                </div>
        
                <div>
                    <input type="button" class="btn-edit-on" id="<?= $hebergement->getId(); ?>" value="Modifier">
                    <input type="button" class="btn-edit-confirm" id="<?= $hebergement->getId(); ?>" value="Valider">
                    <!-- <input type="submit" value="Modifier"> -->
                </div>
            </div>
        </form>
    
        <form action="index.php?action=supprimer&id=<?= $hebergement->getId(); ?>" method="post">
            <div class="form-admin-content">
                <input type="submit" value="Supprimer">
            </div>
        </form>
    </div>
</section>


<?php
}
?>
 