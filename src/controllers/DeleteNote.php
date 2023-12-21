<?php 

namespace controllers;

use controllers\AbstractController;
use models\Note;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $slug = $_POST['slug'];

    $noteModel = new Note();
    $note = $noteModel->find($slug);

    if ($note) {
        $noteModel->delete($slug, null); 
        header("Location: all.php");
        exit();
    } else {
        echo "Note non trouvée.";
    }
}
?>