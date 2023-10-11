<?php

require_once __DIR__ . '/../../../models/Type.php';


try {
    $errors =[];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrez obligatoirement un nom de catégorie';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_TYPES)));
            if (!$isOk) {
                $errors['type'] = 'Veuillez entrez un nom valide';
            } else{
                if(Type::isExist($type)){
                    $errors['type'] ='Cette catégorie existe déjà';
                }
            }
        }
        if (empty($errors)) {
            $newType = new Type();
            $newType->set_type($type);
            $saved = $newType->insert();
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
include __DIR__ . '/../../../views/dashboard/types/new_types.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';

