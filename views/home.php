<main>
    <nav class="navbar navbar-expand-lg mt-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <form id="searchForm" method="get" enctype="multipart/form-data">
                    <div class="d-flex">
                        <select name="type" id="type" class="form-select">
                            <option value="0">Toutes les catégories</option>
                            <?php foreach ($types as $type) { ?>
                                <?php $isSelected = ($id_types == $type->id_types ? 'selected' : '') ?>
                                <option value="<?= $type->id_types ?>" <?= $isSelected ?>>
                                    <?= $type->type ?>
                                <?php } ?>
                                </option>
                        </select>
                        <input class="form-control" value="<?= $searchs ?>" type="search" name="search" id="search">
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-4">Nos Véhicules</h1>
    <p class="text-center mt-5">Bienvenue sur Rentacaisse, ici vous pouvez réserver toutes sortes de véhicules disponibles sur le site </p>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <?php
            foreach ($vehicles as $vehicle) { ?>
                <div class="col-sm-4 mt-3">
                    <div class="card h-100 text-center align-items-center pt-3">
                        <div class="card-body p-0">
                            <img class="card-img-top" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->picture ?>">
                            <p class="mt-4">Catégorie : <?= $vehicle->type ?></p>
                            <p class="mt-4">Marque : <?= $vehicle->brand ?></p>
                            <p class="mt-4">Modéle : <?= $vehicle->model ?></p>
                            <a class="btn btn-primary" href="/controllers/information_vehicle-ctrl.php?id=<?= $vehicle->id_vehicles ?>&id_type=<?= $vehicle->id_types ?>">+ d'infos sur le véhicule</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <nav class="text-center mt-5">
            <ul class="pagination justify-content-center">
                <?php $disable = ($page == 1) ? 'disabled' : ""; ?>
                    <li class="page-item <?= $disable ?>">
                        <a class="page-link" href="?id_types=<?= $id_types?>&search=<?= $searchs ?>&page=<?= $page-1 ?>">
                            <<
                        </a>
                    </li>
                <?php for ($currentPage = 1; $currentPage <= $nbPages; $currentPage++) {
                    $active = ($currentPage == $page) ? "active" : "";
                ?>
                    <li class="page-item <?= $active ?>">
                        <a class="page-link" href="?id_types=<?= $id_types ?>&search=<?= $searchs ?>&page=<?= $currentPage ?>"><?= $currentPage ?></a>
                    </li>
                <?php } ?>
                <?php
                $disable = ($page == $nbPages) ? 'disabled' : ""; ?>
                <li class="page-item <?= $disable ?>">
                    <a class="page-link" href="?id_types=<?= $id_types ?>&search=<?= $searchs ?>&page=<?= $page+1 ?>"> >></a>
                </li>
            </ul>
        </nav>
    </div>    

</main>
<script src="/public/assets/js/home.js"></script>

<!-- class PHP mailher -->