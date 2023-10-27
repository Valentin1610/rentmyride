<?php

require __DIR__ . '/../../../models/Vehicle.php';
require __DIR__ . '/../../../models/Rent.php';
require __DIR__ . '/../../../models/Client.php';
require __DIR__ . '/../../../models/Type.php';

try {
    $title = 'Liste de toutes les réservations';
} catch (\Throwable $th) {
    $errors = $th ->getMessage();
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/rents/list_bookings.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';