<?php 

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';


try{
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    if((empty($order) || $order != 'ASC') && $order != 'DESC'){
        $order = 'ASC';
    }
    $vehicles = Vehicle::get_all($order);
    $archives = Vehicle::get_archive($order);

} catch (\Throwable $th){
    $errors = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicules/list_vehicule.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';