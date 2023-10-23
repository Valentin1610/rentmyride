<main>
    <h2 class="text-center mt-4">Nos Vehicules</h2>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>"alt="<?= $vehicle->picture ?>">
                        <p>Catégorie : <?= $types->type ?></p>
                        <p>Marque : <?= $vehicle->brand ?></p>
                        <p>Modéle : <?= $vehicle->model?></p>
                        <p>Plaque d'immatriculation : <?=$vehicle->registration ?></p>
                        <p>Kilométrage : <?= $vehicle->mileage ?> Km</p>
                        <div class ="mt-4 m-2 p-3">
                            <a class="text-decoration-none btn btn-success" href="/controllers/">Louer ce véhicule</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 m-2 p-3">
        <a class="text-decoration-none btn btn-primary" href="/controllers/home-ctrl.php"><< Retour à la page d'accueil </a>
    </div>
</main>