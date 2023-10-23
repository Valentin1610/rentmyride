<?php

require __DIR__ . '/../../../models/Vehicle.php';

try {
    $erors = [];
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $ifArchive=Vehicle::archive($id_vehicles); 
    header('location: /controllers/dashboard/vehicules/list_vehicules-ctrl.php?delete='.$ifArchive);
    die;
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include  __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
}