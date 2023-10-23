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
                <th>Archiver</th>
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
                    <td><?= $vehicle->picture ?></td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/modifies_vehicules-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                            <i class="fa-solid fa-screwdriver-wrench text-black"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/archive_vehicules-ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                            <i class="fa-solid fa-box-archive"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3 class="text-center">Archives</h3>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>
                    <a class="text-dark" href="?order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&column=type">
                        Catégorie
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>
                    <a class="text-dark" href="?order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&column=brand">
                        Marque
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>
                    <a class="text-dark" href="?order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&column=model">
                        Modéle
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                </th>
                <th>Plaque d'immatriculation</th>
                <th>Kilométrage</th>
                <th>Image</th>
                <th>Désharchivé le :</th>
                <th>Désarchiver</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($archives as $archive) { ?>
                <tr>
                    <td><?= $archive->id_vehicles ?></td>
                    <td><?= $vehicle->type ?></td>
                    <td><?= $archive->brand ?></td>
                    <td><?= $archive->model ?></td>
                    <td><?= $archive->registration ?></td>
                    <td><?= $archive->mileage ?></td>
                    <td><?= $archive->picture ?></td>
                    <td><?= $archive->deleted_at ?></td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/list_vehicules-ctrl.php?id_vehicles=<?= $archive->id_vehicles ?>">
                            <i class="fa-solid fa-trash-arrow-up text-black"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/delete_vehicules-ctrl.php?id_vehicles=<?= $archive->id_vehicles ?>">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>