<?php

require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';

try {
    $errors = [];
    $title = 'Information du véhicule • RentaCaisse';

    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
    $id_types = intval(filter_input(INPUT_GET, 'id_type', FILTER_SANITIZE_NUMBER_INT));
    $types = Type::get($id_types);

} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ .'/../views/templates/header.php';
    include __DIR__ .'/../views/templates/error.php';
    include __DIR__ .'/../views/templates/footer.php';
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/information_vehicle.php';
include __DIR__ . '/../views/templates/footer.php';