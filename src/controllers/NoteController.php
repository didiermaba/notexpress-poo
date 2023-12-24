<?php

namespace controllers;

use controllers\AbstractController;

use models\Note;

class NoteController extends AbstractController
{
    static public function add()
    {
        $note = new Note();
        $note->setTitle($_POST['title'])
            ->setSlug(uniqid("note_"))
            ->setContent($_POST['content']);
        if (isset($_FILES['image'])) {
            $dirUpload = __DIR__ . '/../../assets/images/uploads/';
            $newFileName = uniqid() . '_' . $_FILES['image']['name'];
            $filePath = $dirUpload . $newFileName;
            $note->setImage($newFileName);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                $note->bindValues();
                $note->create();
                header('Location: /notes');
            }
        }
    }

    static public function update()
    {
        // echo 'Test OK';
        $note = new Note();
        $note->setTitle($_POST['title'])
            ->setContent($_POST['content']);
        $note->bindValues();
        $note->update($_POST['slug']);
        header('Location: /notes');
    }
}
// Don't write any code below this line