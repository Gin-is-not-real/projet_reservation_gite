<?php 
require_once('managers/ConnexionManager.php');//pour appeler les fonctions du manager declaré dans l'index
require 'classes/Hebergement.php';
?>
<article id="cards">
        
<?php
$heb = $manager->getHebergements();
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

<?php
}
?>
</article>