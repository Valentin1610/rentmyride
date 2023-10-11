<form class="text-center mt-5" method="post">
    <div class="form-group">
        <label for="type">Ajoutez une catégorie</label>
        <input type="text" name="type" id="type" required>
        <button type="submit">Ajouter</button>
        <p><?= isset($errors['type']) ? $errors['type'] : '' ?></p>
    </div>
</form>