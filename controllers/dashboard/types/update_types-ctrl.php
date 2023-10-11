<?php

require_once __DIR__ . '/../../../models/Type.php';


try {
    $errors = [];
    $id_types = (filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $typesObj = Type::get($id_types);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrez obligatoirment une catégorie';
        } else {

            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_TYPES)));
            if (!$isOk) {
                $errors['type'] = 'Veuillez bien entrer une catégorie de véhicule';
            }
        }
        if (empty($errors)) {
            $newType = new Type();
            $newType->set_type($type);
            $newType->set_Id_types($id_types);
            $saved = $newType->update();
            if ($saved == true) {
                header('location: /controllers/dashboard/types/list_types-ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/update_types.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
