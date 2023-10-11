<main>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Catégorie</th>
                <th>Marque</th>
                <th>Modéle</th>
                <th>Plaque d'immatriculation</th>
                <th>Kilométrage</th>
                <th>Image</th>
                <th>Crée le :</th>
                <th>Modifié le :</th>
                <th>Supprimé le :</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td><?= $vehicle->id_vehicles ?></td>
                    <td></td>
                    <td><?= $vehicle->brand ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->registration ?></td>
                    <td><?= $vehicle->mileage ?></td>
                    <td><?= $vehicle->picture ?></td>
                    <td><?= $vehicle->created_at ?></td>
                    <td><?= $vehicle->updated_at ?></td>
                    <td><?= $vehicle->deleted_at ?></td>
                    <td>
                        <a href="/controllers/dashboard/vehicules/modifies_vehicules-ctrl.php">
                            <i class="fa-solid fa-screwdriver-wrench text-black"></i>
                        </a>
                    </td>
                    <td>
                        <a href="">
                            <i class="fa-solid fa-trash text-black"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?> 
        </tbody>
    </table>
</main>