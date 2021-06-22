<?php
    require_once 'classes/Hebergement.php';

    $heb = $manager->getHebergements();
    while($data = $heb->fetch()) {
        $hebergement = new Hebergement($data);
?>
<h3>Modifier, Supprimer</h3>
<section class="card-form" id=<?= $hebergement->getId(); ?>>

    <form id="form-admin-edit-<?= $hebergement->getId(); ?>" action="index.php?action=modifier&id=<?= $hebergement->getId(); ?>"  method="post">

        <div>
            <label for="intitule">intitule</label>
            <input type="text" name="intitule" id="" value=<?= $hebergement->getIntitule(); ?>>
        </div>

        <div>
            <label for="categorie">categorie</label>

            <select name="categorie">
                <option value=""><?= $hebergement->getCategorie(); ?> </option>
                <option value="chambre"> Chambre </option>
                <option value="appart"> Appartement </option>
                <option value="maison"> Maison </option>
                <option value="villa"> Villa </option>
            </select>
        </div>

        <div>
            <label for="localisation">localisation</label>
            <input type="text" name="localisation" id="" value=<?= $hebergement->getLocalisation(); ?>>
        </div>

        <div>
            <label for="photo">photo</label>
            <input type="text" name="photo" id="" value="static/img/maldive-500-700.png">
        </div>

        <div>
            <label for="description">description</label>
            <input type="text" name="description" id="" value=<?= $hebergement->getDescription(); ?>>
        </div>

        <div>
            <label for="nb_lits">nb_lits</label>
            <input type="number" name="nb_lits" id="" value=<?= $hebergement->getNbLits(); ?>>
        </div>

        <div>
            <label for="nb_sdb">nb_sdb</label>
            <input type="number" name="nb_sdb" id="" value=<?= $hebergement->getNbSdb(); ?>>
        </div>

        <div>
            <label for="localisation">localisation</label>
            <input type="text" name="localisation" id="" value=<?= $hebergement->getLocalisation(); ?>>
        </div>

        <div>
            <label for="prix">prix</label>
            <input type="number" name="prix" id="" value=<?= $hebergement->getPrix(); ?> >
        </div>

        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>

    <form action="index.php?action=supprimer&id=<?= $hebergement->getId(); ?>" method="post">
            <input type="submit" value="Supprimer">
    </form>
</section>

<?php
}
?>