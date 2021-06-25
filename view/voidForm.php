<section id="admin-add-section">
    <form class="form-admin" id="form-admin-add" action="index.php?action=ajouter" method="post">
        <header>
            <h3>Ajouter</h3>
        </header>

        <div class="form-admin-content">
            <div>
                <label for="intitule">Intitulé</label>
                <input type="text" name="intitule" required>
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
                <input type="text" name="localisation" required>
            </div>

            <div>
                <label for="photo">photo</label>
                <input type="text" name="photo" required>
            </div>

            <div>
                <label for="description">description</label>
                <textarea name="description" required></textarea>
            </div>

            <div>
                <label for="nbr_lits">nbr_lits</label>
                <input type="number" name="nbr_lits" required>
            </div>

            <div>
                <label for="nbr_sdb">nbr_sdb</label>
                <input type="number" name="nbr_sdb" required>
            </div>

            <div>
                <label for="prix">prix</label>
                <input type="number" name="prix" required>
            </div>

            <input type="submit" value="Ajouter">
        </div>

    </form>
</section>
