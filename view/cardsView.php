<?php 
require_once 'classes/Hebergement.php';
?>

<article id="cards">
        
    <?php
    $heb = $manager->getHebergements();
    while($data = $heb->fetch()) {
        $hebergement = new Hebergement($data);

        //la fonction pour recuperer les reservations par hebergements via req SQL
        $resa = $resaManager->getReservationsById($hebergement->getId());
        foreach ($resa as $value) {

            foreach ($value as $key => $result) {

                if(is_string($key) && ($key == 'date_liberation' || $key == 'date_occupation')) {
                    echo '<input type="hidden" class="' . $key . '-' . $hebergement->getId() . '" value="' . $result . '">';
                }
            }
        }
    ?>

        <!-- CARD -->
        <section class='card' id=<?= $hebergement->getId(); ?> >
            <header class="card-header">
                <div>
                    <h3><?= $hebergement->getIntitule(); ?></h3>
                    <button id="card-close">X</button>
                </div>

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

                <!-- <div class="card-button-div">
                    <input class="btn-seemore" id="seemore-<?= $hebergement->getId(); ?>" type="button" value="voir les dispo">
                </div> -->

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

        <section class="reservation-picker" id="picker-<?= $hebergement->getId(); ?>" >
                <?php include "calendar.php"; ?>
        </section>

<?php
}
?>
</article>