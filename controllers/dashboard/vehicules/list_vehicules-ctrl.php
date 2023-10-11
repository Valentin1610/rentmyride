<?php 

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';



try{
    $vehicles = Vehicle::get_all();
    
} catch (\Throwable $th){
    $errors = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicules/list_vehicule.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php'; 