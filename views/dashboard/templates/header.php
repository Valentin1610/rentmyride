<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
    <link rel="shortcut icon" href="/public/assets/img/outils.png" type="image/x-icon">
    <title>DashBoard • Rent My Ride </title>
</head>

<body>
    <header>
        <nav>
            <div class="d-flex align-items-center">
                <div class="mr-auto m-4 p-2">
                    <h1>DashBoard</h1>
                </div>
                <div class="d-flex justify-content-around p-2">
                    <div class="p-2">
                        <a href='/controllers/dashboard/dashboard-ctrl.php'>Accueil</a>
                    </div>
                    <div class="p-2">
                        <a href='/controllers/dashboard/types/new_types-ctrl.php'>Ajouter une catégorie</a>
                    </div>
                    <div class="p-2">
                        <a href='/controllers/dashboard/types/list_types-ctrl.php'>Afficher la liste des catégories</a>
                    </div>
                    <div class="p-2">
                        <a href='/controllers/dashboard/vehicules/new_vehicules-ctrl.php'>Ajouter un véhicule</a>
                    </div>
                    <div class="p-2">
                        <a href='/controllers/dashboard/vehicules/list_vehicules-ctrl.php'>Afficher la liste des véhicules</a>
                    </div>
                    <div class="p-2">
                        <a href='/controllers/home-ctrl.php'>Retour sur le site</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>