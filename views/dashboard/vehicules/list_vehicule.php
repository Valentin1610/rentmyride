<main>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>
                    <a class="text-dark" href="?column=type&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                        Catégorie
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>
                    <a class="text-dark" href="?column=brand&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                        Marque
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>
                    <a class="text-dark" href="?column=model&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                        Modéle
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>Plaque d'immatriculation</th>
                <th>Kilométrage</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td><?= $vehicle->id_vehicles ?></td>
                    <td><?= $vehicle->type ?></td>
                    <td><?= $vehicle->brand ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->registration ?></td>
                    <td><?= $vehicle->mileage ?></td>
                    <td><?php if (isset($vehicle->picture)) { ?>
                            <a href="/public/uploads/vehicles/<?= $vehicle->picture ?>" target="_blank"><i class="fa-solid fa-image"></i></a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/modifies_vehicules-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                            <i class="fa-solid fa-screwdriver-wrench text-black"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/archive_vehicules-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                            <i class="fa-solid fa-box-archive"></
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>