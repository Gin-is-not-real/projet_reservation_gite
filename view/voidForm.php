<form id="form-admin" action="index.php?action=ajouter" method="post">
    <H3>Ajouter</H3>
    <div>
        <label for="intitule">Intitulé</label>
        <input type="text" name="intitule" id="">
    </div>
     

    <div> 
        <label for="categorie"> Catégorie </label> 
            <select name="categorie">
                <option value="chambre"> Chambre </option>
                <option value="appartement"> Appartement </option>
                <option value="maison"> Maison </option>
                <option value="villa"> Villa </option>
            </select>
    </div>

    <div>
        <label for="localisation">localisation</label>
        <input type="text" name="localisation" id="">
    </div>

    <div>
        <label for="photo">photo</label>
        <input type="text" name="photo" id="">
    </div>

    <div>
        <label for="description">description</label>
        <input type="text" name="description" id="">
    </div>

    <div>
        <label for="nbr_lits">nbr_lits</label>
        <input type="number" name="nbr_lits" id="">
    </div>

    <div>
        <label for="nbr_sdb">nbr_sdb</label>
        <input type="number" name="nbr_sdb" id="">
    </div>

    <div>
        <label for="prix">prix</label>
        <input type="number" name="prix" id="">
    </div>

    <input type="submit" value="Ajouter">
</form>