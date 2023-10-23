<h2 class="text-center">Liste de toutes les catégories</h2>

<table class="m-0 mt-5 table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Type de véhicule</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($types as $type) { ?>
        <tr>
            <td><?= $type->id_types ?></td>
            <td><?= $type->type ?></td>
            <td>
                <a href="/controllers/dashboard/types/update_types-ctrl.php?id_types=<?= $type->id_types ?>">
                    <i class="fa-solid fa-screwdriver-wrench text-black"></i>
                </a>
            </td>
            <td>
                <a href="/controllers/dashboard/types/delete_types-ctrl.php?id_types=<?= $type->id_types ?>">
                    <i class="fa-solid fa-trash text-black"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<p>
    <?php 
    if($delete === '1'){
        echo 'Catégorie supprimée';
    } elseif($delete === '0'){
        echo 'Catégorie non supprimée';
    }
?></p>

<a href="/controllers/dashboard/types/new_types-ctrl.php">Ajouter</a>