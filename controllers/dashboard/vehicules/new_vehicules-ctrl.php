<?php

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';

$errors = [];

try {
    $types = Type::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $picture= $_FILES['picture'];
        
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

        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez entrez obligatoirement le nombre de kilométrage du véhicule';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_INT);
            if (!$isOk) {
                $errors['mileage'] = 'Veuillez entrez un nombre';
            }
        }

        $newNameFile = NULL;
        if ($picture['error'] != 4) {
            try {
                if ($picture['error'] != 0) {
                    throw new Exception("Fichier non envoyé");
                }
                if (!in_array($picture['type'], VALIDATE_EXTENSIONS)) {
                    throw new Exception('Veuillez entrez un fichier valide');
                }
                if ($picture['size'] >= FILE_SIZE) {
                    throw new Exception('Taille du fichier trop lourd', 4);
                }

                $extenstion = pathinfo($picture['name'], PATHINFO_EXTENSION);
                $newNameFile = uniqid('img_') . '.' . $extenstion;
                $from = $picture['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/vehicles/' .$newNameFile;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $errors = $th->getMessage();
            }
        }

        $id_types = filter_input(INPUT_POST, 'id_types', FILTER_SANITIZE_NUMBER_INT);
        if (!$id_types) {
            $errors['id_types'] = 'Ce champs est obligatoire!';
        } else {
            if (empty($id_types)) {
                $errors['types'] = 'Cette catégorie n\'existe pas ';
            }
        }


        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->set_brand($brand);
            $newVehicle->set_model($model);
            $newVehicle->set_registration($registration);
            $newVehicle->set_mileage($mileage);
            $newVehicle->set_picture($newNameFile);
            $newVehicle->set_id_types($id_types);
            $saved = $newVehicle->insert();

            if ($saved) {
                header('location: /controllers/dashboard/vehicules/list_vehicules-ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicules/new_vehicules.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
