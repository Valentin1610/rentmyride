<?php

require_once __DIR__ . '/../../../models/Type.php';

try{
    $types = Type::getAll();
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);

} catch (\Throwable $th){
    $errors->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}



include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/list_types.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';

