<?php 

namespace controllers;


use models\Note;


$noteModel = new Note();
$notes = $noteModel->findAll();



if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $note = $noteModel->find($slug);
    if ($note) {
        include 'view_note_view.php';
    } else {
        echo "Note non trouvée.";
    }
}




