<?php 

require_once __DIR__ . "/../../src/controllers/EditNote.php";

$pageTitle = 'Edit note';

?>

<h1><?= $pageTitle ?></h1>

<h1>Modifier une Note</h1>
    <form method="POST" action="update_note.php">
        <input type="hidden" name="slug" value="<?= $note->getSlug() ?>">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?= $note->getTitle() ?>"><br>
        <label for="content">Contenu :</label>
        <textarea id="content" name="content"><?= $note->getContent() ?></textarea><br>
        <input type="submit" value="Modifier">
    </form>