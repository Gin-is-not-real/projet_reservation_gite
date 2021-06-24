<?php 
require_once 'classes/Hebergement.php';
?>

<article id="cards">
    <?php

    $heb = $manager->getHebergementsWithFilter();
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

        if(isset($_GET['filter'])) {
            echo '<script type="text/javascript">', 
                'document.querySelector("#ancre-cardsView").click();',
                '</script>';
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


                    <div>
<<<<<<< HEAD
                        <figure>
                            <img class="icon2" src="static/icons/euro3.png" alt="euro">
                        </figure>
                        <!-- <div>
=======
<<<<<<< HEAD
>>>>>>> 8009d018c14bf2fbb3cf0c778aa8ab35c8467d75
                            <?= $hebergement->getPrix(); ?> Euro/jours
                        </div> -->
                    </div>
=======
                        <figure>
                        <img class="icon" src="static/img libre/euro2.png" alt="prix">
                        </figure>
                    </div>



>>>>>>> 4c5636f431c6e95144f6e1220008d0273482b503
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