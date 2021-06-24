<!-- <?php require_once 'index.php'; ?> -->
<section id="sec-filters">
    <form action="index.php?action=filter" method="post"> 
    <!-- <form action="view/homeView.php" method="post">  -->

        <div class="inp-container" id="cont-categorie">
            <label for="categorie"> Catégorie </label> 
            <select name="categorie" id="categorie">
                <option value="">  </option>
                <option value="chambre"> Chambre </option>
                <option value="appartement"> Appartement</option>
                <option value="maison"> Maison </option>
                <option value="villa"> Villa </option>
            </select>
        </div>

        <div class="inp-container" id="cont-date-arrivee">
            <label for="date-arrivee">Date d'arrivée </label>
            <input class="inp-search" type="date" id="date-arrivee" name="date-arrivee" >
        </div>

        <div class="inp-container" id="cont-nbr-lits">
            <label for="nbr-lits">Nombre de lits </label> 
            <input class="inp-search" type="number" name="nbr-lits" min="0" id="nbr-lits">
        </div>

        <div class="inp-container" id="cont-date-depart">
            <label for="date-depart">Date de départ </label> 
            <input class="inp-search" name="date-depart" type="date" id="date-depart">
        </div>

        <div class="inp-container" id="cont-nbr-sdb">
            <label for="nbr-sdb">Nombre de salles de bain </label> 
            <input class="inp-search" type="number" name="nbr-sdb" min="0" id="nbr-sdb">
        </div>
        <div class="inp-container" id="cont-prix">
            <label for="prix">Prix Max </label> <input class="inp-search" type="number"  name="prix" min="0" id="prix">
        </div>
        
        <div id="form-filters-div-button">
            <input type="submit" value="rechercher">
        </div>
      </form>
</section>
