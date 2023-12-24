<?php

namespace controllers;

use models\Note;
use controllers\NoteController;

class Router
{
   
    static public function route($request): void
    {
        include_once __DIR__ . '/../../views/components/header.php';
        // Routes
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['slug'])) {
                    $id = $_GET['slug'];
                    self::handleGetRequest($request, $id);
                    break;
                } else {
                    self::handleGetRequest($request);
                    break;
                }
            case 'POST':
                self::handlePostRequest($request);
                break;
            default:
                http_response_code(405);
                $pageTitle = "Demande non autorisée";
                $pageDescription = "La méthode de la requête n'est pas autorisée.";
                require __DIR__ . '/../../views/405.php';
                break;
        }
        include_once __DIR__ . '/../../views/components/footer.php';
    }

    /**
     * Method handleGetRequest()
     * To handle GET requests and display the right view with the right data
     */
    static public function handleGetRequest($request, ?string $id = null)
    {
        if ($id) {
            $note = new Note();
            $note->find($id);
            var_dump($note);
            require __DIR__ . '/../../views/notes/show.php';
            return;
        }
        switch ($request) {
            case '':
            case '/':
                $pageTitle = "Accueil";
                $pageDescription = "NoteXpress est une application de prise de notes en ligne.";
                $notes = (new Note())->findAll();
                require __DIR__ . '/../../views/home.php';
                break;
            case '/notes':
            case '/notes/':
                $pageTitle = "Toutes les notes";
                $pageDescription = "Retrouvez toutes les notes de NoteXpress.";
                $notes = (new Note())->findAll();
                require __DIR__ . '/../../views/notes/all.php';
                break;
            case '/note':
            case '/note/':
                $pageTitle = "Note";
                $pageDescription = "Consultez une note de NoteXpress.";
                require __DIR__ . '/../../views/notes/show.php';
                break;
            case '/note/add':
            case '/note/add/':
                $pageTitle = "Créer une nouvelle note";
                $pageDescription = "Créez une nouvelle note sur NoteXpress.";
                require __DIR__ . '/../../views/notes/add.php';
                break;
            case '/note/edit':
            case '/note/edit/':
                $pageTitle = "Modification d'une note";
                $pageDescription = "Modifiez une note sur NoteXpress.";
                require __DIR__ . '/../../views/notes/edit.php';
                break;
            default:
                http_response_code(404);
                $pageTitle = "Page introuvable";
                $pageDescription = "La page demandée n'existe pas.";
                require __DIR__ . '/../../views/404.php';
                break;
        }
    }

    /**
     * Method handlePostRequest()
     * To handle POST requests and treat the data sent by the user
     */
    static public function handlePostRequest($request)
    {
        switch ($request) {
            case '/note/add':
            case '/note/add/':
                // add() is a static method of the NoteController class
                NoteController::add();
                break;
            case '/note/edit':
            case '/note/edit/':
                // TODO: handle the update of a note in the NoteController
                $pageTitle = "Modification d'une note";
                $pageDescription = "Modifiez une note sur NoteXpress.";
                $note = new Note();
                $note->setTitle($_POST['title'])
                    ->setContent($_POST['content']);
                $note->bindValues();
                $note->update($_POST['slug']);
                header('Location: /notes');
                break;
            default:
                http_response_code(404);
                $pageTitle = "Page introuvable";
                $pageDescription = "La page demandée n'existe pas.";
                require __DIR__ . '/../../views/404.php';
                break;
        }
    }
}