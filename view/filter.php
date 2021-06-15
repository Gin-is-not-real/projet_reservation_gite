<section id="sec-filters">
    <form action=""> 
        <div>
            <label for="categorie"> Catégorie </label> 
            <select name="categorie" id="categorie">
                <option value="">  </option>
                <option value=""> Chambres </option>
                <option value=""> Appartements </option>
                <option value=""> Maison </option>
                <option value=""> Villas </option>
            </select>
        </div>

        <!-- <label for="categorie"> Catégorie </label>  <input class="inp-search" type="select" id="categorie"> -->
        <div>
            <label for="date-arrivee">Date d'arrivée </label> <input class="inp-search" type="date" id="date-arrivee">
        </div>

        <div>
            <label for="nbr-lits"> Nombre de lits </label> <input class="inp-search" type="number" min="0" id="nbr-lits">
        </div>

        <div>
            <label for="date-depart"> Date de départ </label> <input class="inp-search" type="date" id="date-depart">
        </div>

        <div>
            <label for="nbr-sdb"> Nombre de salles de bain </label> <input class="inp-search" type="number" min="0" id="nbr-sdb">
        </div>
        <div>
            <label for="prix"> Prix </label> <input class="inp-search" type="number" min="0" id="prix">
        </div>
        
        <div id="form-filters-div-button">
            <button>Rechercher</button>
        </div>
      </form>
</section>
