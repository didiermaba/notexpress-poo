<?php 

require_once __DIR__ . "/../../src/controllers/Note.php";

$pageTitle = 'All notes';

?>

<h1><?= $pageTitle ?></h1>

<h1>Liste des Notes</h1>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="edit.php?slug=<?= $note->getSlug() ?>">
                    <?= $note->getTitle() ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>