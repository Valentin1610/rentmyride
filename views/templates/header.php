<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="shortcut icon" href="/public/assets/img/846338.png">
    <?php if (isset($script)){ ?>
        <script defer src="/public/assets/js/<?= $script?>js"></script>
    <?php } ?>
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <div class="text-center">
            <a href="/controllers/home-ctrl.php">
                <img class="h-50" src="/public/assets/img/RENTECAISSE.png" alt="logo">
            </a>
        </div>
    </header>