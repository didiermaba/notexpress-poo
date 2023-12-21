<?php 
$pageTitle = 'Note';

?>

<h1><?= $pageTitle ?></h1>

<h1>Details de la Note</h1>
    <h2><?= $note->getTitle() ?></h2>
    <p><?= $note->getContent() ?></p>