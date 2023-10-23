<?php

require_once __DIR__  . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../config/constants.php';


$errors = [];
try {
    $script = 'home.';
    $title = 'Accueil • RentaCaisse';
    $types = Type::getAll();
    $id_types = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));
    $searchs = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));


    if(empty($page)){
        $page = 1;
    }
    $vehicles = Vehicle::get_all(id_types: $id_types, searchs: $searchs, page: $page);
    $totalVehicles = Vehicle::get_all(id_types: $id_types, searchs: $searchs, all: true);

    $nbVehicles = count($totalVehicles);
    $nbPages = ceil($nbVehicles / NB_ELEMENTS_PER_PAGE);

} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
