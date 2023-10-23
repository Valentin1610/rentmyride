<?php

require_once __DIR__  . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';


try {
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $vehicles = Vehicle::get_all($order);
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
