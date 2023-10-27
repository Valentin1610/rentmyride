<main>
    <h2 class="text-center mt-4">Nos Véhicules</h2>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <img class="rounded" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->picture ?>">
                        <p>Catégorie : <?= $types->type ?></p>
                        <p>Marque : <?= $vehicle->brand ?></p>
                        <p>Modéle : <?= $vehicle->model?></p>
                        <p>Plaque d'immatriculation : <?=$vehicle->registration ?></p>
                        <p>Kilométrage : <?= $vehicle->mileage ?> Km</p>
                        <div class ="mt-4 m-2 p-3">
                            <a class=" btn text-decoration-none" href="/controllers/rents-ctrl.php?id=<?= $vehicle->id_vehicles?>&id_type=<?= $vehicle->id_types ?>">Louer ce véhicule</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 m-2 p-3">
        <a class="btn text-decoration-none" href="/controllers/home-ctrl.php"><i class="fa-solid fa-backward"></i>Retour à la page d'accueil</a>
    </div>
</main>