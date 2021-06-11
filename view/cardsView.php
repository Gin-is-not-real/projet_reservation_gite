<?php 
require_once('managers/ConnexionManager.php');//pour appeler les fonctions du manager declaré dans l'index
require 'classes/Hebergement.php';

$heb = $manager->getHebergement(2);
while($data = $heb->fetch()) {
    $hebergement = new Hebergement($data);
?>
    <section class='card'>
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
            <input type="button" value="see more">
        </div>

        <footer class="card-footer">
        <figure>
            <?= $hebergement->getNbLits(); ?>
            <img src="" alt="nbr de lits">
        </figure>
        <figure>
            <?= $hebergement->getNbSdb(); ?>
            <img src="" alt="nbr de sdb">
        </figure>
    </footer>
    </div>


</section>
<?php
}