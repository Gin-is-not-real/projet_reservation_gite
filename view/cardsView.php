<?php 
require_once 'classes/Hebergement.php';
?>

<article id="cards">
        
    <?php
    $heb = $manager->getHebergements();
    while($data = $heb->fetch()) {
        $hebergement = new Hebergement($data);
    ?>

        <section class='card' id=<?= $hebergement->getId(); ?> >
            <header class="card-header">
                <h3><?= $hebergement->getIntitule(); ?></h3>

                <div>
                    <h4><?= $hebergement->getCategorie(); ?></h4>
                    <ul>
                        <li>tag 1</li>
                        <li>tag 2</li>
                        <li>tag 5</li>
                    </ul>
                </div>
            </header>

            <div class="card-content">
                <figure>
                    <img src="static/img/maldive-500-700.png" alt="image de gite">
                </figure>

                <div class="card-description">
                    <p>
                        <?= $hebergement->getDescription(); ?> 
                    </p>
                </div>

                <div class="card-button-div">
                    <input type="button" value="voir les dispo">
                </div>

                <footer class="card-footer">
                    <div>
                        <figure>
                            <img class="icon" src="static/icons/yellow_single-room_icon-icons.com_59593.png" alt="nbr de lits" width="48px" height="auto" >
                        </figure>
                        <div>
                            <?= $hebergement->getNbLits(); ?>
                        </div>
                    </div>

                    <div>
                        <figure>
                            <img class="icon" src="static/icons/yellow_shower_01_icon-icons.com_59592.png" alt="nbr de sdb">
                        </figure>
                        <div>
                            <?= $hebergement->getNbSdb(); ?>
                        </div>
                    </div>
                </footer>
            </div>
        </section>

            <section class="card-form" id=<?= $hebergement->getId(); ?>>

                <form id="form-admin-edit-<?= $hebergement->getId(); ?>" action="index.php?action=modifier&id=<?= $hebergement->getId(); ?>"  method="post">

                    <div>
                        <label for="intitule">intitule</label>
                        <input type="text" name="intitule" id="" value=<?= $hebergement->getIntitule(); ?>>
                    </div>

                    <div>
                        <label for="categorie">categorie</label>
                        <input type="text" name="categorie" id="" value=<?= $hebergement->getCategorie(); ?>>
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
            </section>



<?php
}
?>
</article>