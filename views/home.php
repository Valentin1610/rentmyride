<main>
    <h1 class="text-center mt-3">Nos Véhicules</h1>
    <p class="text-center mt-4">Bienvenue sur Rentacaisse, ici vous pouvez réserver toutes sortes de véhicules disponibles sur le site </p>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php
            foreach ($vehicles as $vehicle) { ?>
                <div class="col-sm-4 m-0 mt-4 ">
                    <div class="card text-center d-flex align-items-center mt-3">
                        <div class="card-body p-0">
                            <img class="card-img-top" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->picture ?>">
                            <p class="mt-4">Marque : <?= $vehicle->brand ?></p>
                            <p class="mt-4">Modéle : <?= $vehicle->model ?></p>
                            <a class="btn btn-primary" href="/controllers/information_vehicle-ctrl.php">+ d'infos</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>