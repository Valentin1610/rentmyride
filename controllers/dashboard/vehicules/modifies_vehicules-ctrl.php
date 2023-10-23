<?php

require_once __DIR__  . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__  . '/../../../config/regex.php';

try {
    $errors = [];
    $types = Type::getAll();
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $picture = $_FILES['picture'];

        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($brand)) {
            $errors['brand'] = "Veuillez entrez obligatoirement une marque de véhicule";
        } else {
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_BRAND)));
            if (!$isOk) {
                $errors['brand'] = "Veuillez entrer une marque de véhicule valide";
            }
        }

        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($model)) {
            $errors['model'] = "Veuillez entrez obligatoirement un modéle de véhicule";
        } else {
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_MODEL)));
            if (!$isOk) {
                $errors['model'] = "Veuillez entrer un modéle de véhicule valide";
            }
        }

        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($registration)) {
            $errors['registration'] = "Veuillez entrez obligatoirement une plaque d'immatriculation";
        } else {
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_REGISTRATION)));
            if (!$isOk) {
                $errors['registration'] = "Veuillez entrez un numéro de plaque d'immatriculation valide";
            }
        }

        $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);
        if (empty($mileage)) {
            $errors['mileage'] = "Veuillez entrer obligatoirement un nombre de kilométrage du véhicule";
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_INT);
        }
        if (!$isOk) {
            $errors['mileage'] = "Veuillez entrez un nombre";
        }

        $id_types = intval(filter_input(INPUT_POST, 'types', FILTER_SANITIZE_NUMBER_INT));

        $fileName = $vehicle->picture;
        if ($picture['error'] != 4) {
            try {
                if ($picture['error'] != 0) {
                    throw new Exception("Fichier non envoyé");
                }
                if (!in_array($picture['type'], VALIDATE_EXTENSIONS)) {
                    throw new Exception('Veuillez entrez un fichier valide');
                }
                if ($picture['size'] >= FILE_SIZE) {
                    throw new Exception('Taille du fichier trop lourd');
                }

                $extenstion = pathinfo($picture['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('img_') . '.' . $extenstion;
                $from = $picture['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/vehicles/' . $fileName;
                @unlink(__DIR__ . '/../../../public/uploads/vehicles/' . $vehicle->picture);
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $errors = $th->getMessage();
            }
        }

        if (empty($errors)) {
            $newVehicule = new Vehicle();
            $newVehicule->set_Id_vehicles($id_vehicles);
            $newVehicule->set_brand($brand);
            $newVehicule->set_model($model);
            $newVehicule->set_registration($registration);
            $newVehicule->set_mileage($mileage);
            $newVehicule->set_picture($fileName);
            $newVehicule->set_id_types($id_types);
            $saved = $newVehicule->update();
            if ($saved) {
                header('location: /controllers/dashboard/vehicules/list_vehicules-ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicules/modify_vehicules.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
