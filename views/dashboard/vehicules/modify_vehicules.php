<main>
    <h2 class="text-center">Modifier le véhicule</h2>
    <form class="text-center" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group mt-5">
                    <label for="brand">Marque*</label>
                    <input type="text" class="form-control" name="brand" id="brand" value="<?= $vehicle->brand ?>" required>
                    <p><?= $errors['brand'] ?? '' ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-5">
                    <label for="model">Modéle*</label>
                    <input type="text" class="form-control" name="model" id="model" value="<?= $vehicle->model ?>" required>
                    <p><?= $errors['model'] ?? '' ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-5">
                    <label for="registration">Plaque d'immatriculation*</label>
                    <input type="text" class="form-control" name="registration" id="registration" value="<?= $vehicle->registration ?>" required>
                    <p><?= $errors['registration'] ?? '' ?></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-5">
                    <label for="mileage">Kilométrage*</label>
                    <input type="text" class="form-control" id="mileage" name="mileage" value="<?= $vehicle->mileage ?>" required>
                    <p><?= $errors['mileage'] ?? '' ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group mt-5">
                    <label class="form-label" for="picture">Image du véhicule</label>
                    <input type="file" class="form-control" name="picture" id="picture">
                    <?php if ($vehicle->picture) { ?>
                        <div><img class="w-25" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="thumb mt-2" alt='<?= $vehicle->picture?>'></div>
                    <?php } ?>
                    <p><?= $errors['picture'] ?? '' ?></p>
                </div>
            </div>
        </div>
        <div class="form-group mt-5">
            <label for="types" class="form-label">Catégorie du vehicule*</label>
            <select name="types" id="types" class="form-select" required>
                <option value="">--Sélectionnez une catégorie--</option>
                <?php
                foreach ($types as $type) { ?>
                    <?php $isSelected = ($id_types == $type->id_types ? 'selected' : '') ?>
                    <option value="<?= $vehicle->id_types ?>"><?= $isSelected ?>
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