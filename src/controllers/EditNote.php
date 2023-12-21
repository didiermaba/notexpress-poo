<?php 

namespace controllers;

use controllers\AbstractController;
use models\Note;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $slug = $_POST['slug'];
    $newTitle = $_POST['title'];
    $newContent = $_POST['content'];

    $noteModel = new Note();
    $note = $noteModel->find($slug);

    if ($note) {
        $note->setTitle($newTitle);
        $note->setContent($newContent);
        $noteModel->update($slug);
        
        header("Location: all.php");
        exit();
    } else {
        echo "Note non trouvée.";
    }
}
?>




