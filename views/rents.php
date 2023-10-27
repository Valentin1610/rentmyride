<h2 class="text-center mb-3 mt-3">Réservation</h2>

<form method="post" id="myForm" enctype="multipart/form-data" novalidate>
    <div class="text-center">
        <img class="rounded" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->picture ?>">
        <p class= pt-4>Vous êtes prêt à louer ce véhicule : <?= $vehicle->brand ?> <?= $vehicle->model ?> avec un compteur de <?= $vehicle->mileage ?> km</p>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="container col-4">
                <label for="lastname" class="form-label">Entrez votre nom : *</label>
                <input type="text" class="form-control" value="Sucaud" name="lastname" id="lastname" placeholder="Ex: Dupont" pattern="<?= REGEX_NAME ?>" required>
                <p><?= $errors['lastname'] ??  '' ?></p>
            </div>
            <div class="container col-4">
                <label for="firstname" class="form-label">Entrez votre prénom : *</label>
                <input type="text" class="form-control" value="Valentin" name="firstname" id="firstname" placeholder="Ex : Antoine" pattern="<?= REGEX_NAME ?>" required>
                <p><?= $errors['firstname'] ?? '' ?></p>
            </div>
        </div>
    </div>
    <div class="mt-4 text-center">
        <div class="col-12">
            <label for="email" class="form-label ">Votre adresse mail : *</label>
            <input type="email" value="val.sucaud@gmail.com" class="form-control w-75 mx-auto" placeholder="mail.mail@mail.fr" name="email" id="email" required>
            <p><?= $errors['email'] ?? '' ?></p>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="container col-4">
                <label for="birthdate">Date de naissance : *</label>
                <input class="form-control" type="date" name="birthdate" max ="<?= $datecurrent -> format('Y-m-d')?>"id="birthDate" required>
                <p><?= $errors['birthdate'] ?? ''?></p>
            </div>
            <div class="container col-4">
                <label for="phone">Téléphone*</label>
                <input class="form-control" type="text" maxlength="12" value="0606060606" placeholder="Ex : 0606060606" name="phone" id="phone" pattern="<?= REGEX_PHONE ?>" required>
                <p><?=$errors['phone'] ?? '' ?></p>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="container col-4">
                <label for="zipcode">Code Postal : *</label>
                <input class="form-control" type="text" name="zipcode" value="80200" placeholder="Ex: 80000" id="zipcode" maxlength="5" pattern="<?= REGEX_ZIPCODE ?>" required>
                <p><?= $errors['zipcode'] ?? '' ?></p>
            </div>
            <div class="container col-4">
                <label for="city">Ville : *</label>
                <select name="city" id="city" class="form-select" required>
                    <option selected>Ville</option>
                </select>
                <p><?= $errors['city'] ?? '' ?></p>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="container col-4">
                <label for="startdate">Début de la réservation : *</label>
                <input class="form-control" type="date"  name="startdate" id="startdate" min ='<?=  $datecurrent->format('Y-m-d')?>'>
                <p><?= $errors['startdate'] ?? '' ?></p>
            </div>
            <div class="container col-4">
                <label for="enddate">Fin de réservation : *</label>
                <input class="form-control" type="date" name="enddate" id="enddate" min="<?= $datecurrent->format('Y-m-d')?>">
                <p><?= $errors['enddate'] ?? '' ?></p>
            </div>
        </div>
    </div>
    <p class="text-center mt-4">* : signifie que les champs sont <strong>OBLIGATOIRES</strong></p>
    <div class="text-center fs-5 mt-4 p-3">
        <button class="bg-dark rounded text-white" type="submit">Réserver le véhicule</button>
    </div>
</form>

