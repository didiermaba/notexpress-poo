<h1><?= !empty($pageTitle) ? $pageTitle : '' ?></h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label for="title" class="form-label">Titre de la note</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="content" class="form-label">Contenu de la note</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="input-group mb-2">
        <input type="file" name="image" class="form-control" id="image">
        <label class="input-group-text" for="image">Image</label>
    </div>
    <input type="submit" name="submit" value="Enregister" class="btn btn-success">
</form>