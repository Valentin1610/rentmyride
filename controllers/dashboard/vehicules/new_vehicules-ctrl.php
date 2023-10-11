<?php

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $types = Type::getAll();
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($brand)) {
            $errors['brand'] = 'Veuillez entrez obligatoirement une marque de véhicule';
        } else {
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_BRAND)));
            if (!$isOk) {
                $errors['brand'] = 'Veuillez entrez une catégorie de véhicule correct';
            }
        }

        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($model)) {
            $errors['model'] = 'Veuillez entrez obligatoirement un modéle de véhicule';
        } else {
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_MODEL)));
            if (!$isOk) {
                $errors['model'] = 'Veuillez entrez un modéle de véhicule correct';
            }
        }

        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($registration)) {
            $errors['registration'] = 'Veuillez entrez obligatoirement une plaque d\'immatriculation';
        } else {
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_REGISTRATION)));
            if (!$isOk) {
                $errors['registration'] = 'Veuillez entrer une plaque d\'immatriculation valide';
            }
        }

        $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);
        if (empty($mileage)) {
            $errors['$mileage'] = 'Veuillez entrez obligatoirement le nombre de kilométrage du véhicule';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_INT);
        }
        if (!$isOk) {
            $errors['mileage'] = 'Veuillez entrez un nombre';
        }
        $picture = '';

        $id_types = filter_input(INPUT_POST, 'id_types', FILTER_SANITIZE_NUMBER_INT);
        if(empty($id_types)){
            $errors['$id_types'] = 'Veuillez entrez obligatoirement une catégorie'; 
        } else{
            $isOk = filter_var($id_types, FILTER_VALIDATE_INT);
        }
        
        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->set_brand($brand);
            $newVehicle->set_model($model);
            $newVehicle->set_registration($registration);
            $newVehicle->set_mileage($mileage);
            $newVehicle->set_picture($picture);
            $newVehicle->set_id_types($id_types);
            $saved = $newVehicle->insert();
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    var_dump($th);
    die;
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicules/new_vehicules.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
