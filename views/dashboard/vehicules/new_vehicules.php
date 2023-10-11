<main>
    <h2 class="text-center">Ajouter un véhicule</h2>
    <form class="text-center" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group mt-5">
                    <label for="brand">Marque</label>
                    <input type="text" class="form-control" name="brand" id="brand" required>
                    <p><?= $errors['brand'] ?? '' ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-5">
                    <label for="model">Modéle</label>
                    <input type="text" class="form-control" name="model" id="model" required>
                    <p><?= $errors['model'] ?? '' ?></p>

                </div>
            </div>
            <div class="col">
                <div class="form-group  mt-5">
                    <label for="registration">Plaque d'immatriculation</label>
                    <input type="text" class="form-control" name="registration" id="registration" required>
                    <p><?= $errors['registration'] ?? '' ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-5">
                    <label for="mileage">Kilométrage</label>
                    <input type="text" class="form-control" id="mileage" name="mileage" required>
                    <p><?= $errors['mileage'] ?? '' ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group mt-5">
                    <label for="picture">Image du véhicule</label>
                    <input type="file" class="form-control" name="picture" id="picture">
                    <p><?= $errors['picture'] ?? '' ?></p>
                </div>
            </div>
            </div>
        </div>
        <div class="form-group mt-5">
            <label for="id_types">Catégorie du vehicule</label>
            <select name="id_types" id="id_types" required>
                <option disabled selected>-- Sélectionnez la catégorie du véhicule souhaité --</option>
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type->id_types ?>">
                        <?= $type->type ?>
                    <?php } ?> 
                    </option>
            </select>
        </div>
        <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</main>