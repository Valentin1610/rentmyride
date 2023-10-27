<?php
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/Rent.php';
require_once __DIR__ . '/../models/Client.php';


try {
    $datecurrent = new DateTime();
    $datecurrent->format('Y-m-d');
    $script = 'rents.';

    $title = 'Réserver le véhicule • RentaCaisse';

    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
    $vehicles = Vehicle::get_all();
    $id_clients = intval(filter_input(INPUT_POST, 'id_clients', FILTER_SANITIZE_NUMBER_INT));

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $errors['lastname'] = 'Veuillez entrez un nom obligatoire';
        } else {
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $errors['lastname'] = 'Ce nom n\'est pas valide';
            }
        }

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez entrez un prénom obligatoire';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $errors['firstname'] = 'Ce prénom n\'est pas valide';
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email'] = 'Veuillez entrez une adresse mail obligatoire';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errors['email'] = 'Cette adresse mail n\'est pas valide';
            }
        }

        $birthDate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($birthDate)) {
            $errors['birthdate'] = 'Veuillez indiquez votre date de naissance';
        } else {
            if ($birthDate >= $datecurrent) {
                $errors['birthdate'] = 'Veillez entrez une date passée';
            }
        }

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez entrez un numéro de téléphone';
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PHONE . '/')));
            if (!$isOk) {
                $errors['phone'] = 'Ce numéro de téléphone n\'est pas valide';
            }
        }

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Veuillez entrez un code postal obligaatoire';
        }

        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $errors['city'] = 'Veuillez entrez un nom de ville';
        } else {
            $isOk = filter_var($city, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_CITY . '/')));
            if (!$isOk) {
                $errors['city'] = 'Cette ville n\'existe pas';
            }
        }

        $startdate = filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($startdate)) {
            $errors['startdate'] = 'Veuillez entrez une date de début de réservation';
        } 
        // else {
        //     $isOk = filter_var($startdate, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' '/')))
        // }

        $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($enddate)) {
            $errors['enddate'] = 'Veuillez entrez une date de fin de la réservation';
        } 
        // else {
        //     if ($enddate < $datecurrent) {
        //         $errors['enddate'] = 'Veuillez entrez une date valide';
        //     }
        // }
        if (empty($errors)) {

            $pdo = Database::connect();
            $pdo->beginTransaction();

            $newClient = new Client();
            $newClient->set_lastname($lastname);
            $newClient->set_firstname($firstname);
            $newClient->set_email($email);
            $newClient->set_birthday($birthDate);
            $newClient->set_phone($phone);
            $newClient->set_city($city);
            $newClient->set_zipcode($zipcode);
            $saved = $newClient->add();

            $newRent = new Rent();
            $newRent->set_startdate($startdate);
            $newRent->set_enddate($enddate);
            $newRent->set_id_vehicles($id_vehicles);
            $newRent->set_id_clients($id_clients);

            $savedRent = $newRent->add();

            if($saved && $savedRent) {
                $pdo->commit();
            }


            if($newClient && $savedRent){
                $pdo->commit();
            } else{
                $pdo->rollBack();
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/rents.php';
include __DIR__ . '/../views/templates/footer.php';
