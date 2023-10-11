<?php


require_once __DIR__ . '/../../../models/Type.php';

try{
    $errors =[];
    $id_types = filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT);
    $ifDelete = Type::delete($id_types);
    header('location: /controllers/dashboard/types/list_types-ctrl.php?delete='.$ifDelete);
    die;

} catch(\Throwable $th){
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
}
