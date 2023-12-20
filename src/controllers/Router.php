<?php

namespace controllers;

class Router
{
    /**
     * Method route()
     * To handle the routing of the application
     * @param string $request
     * @return void
     */
    static public function route($request): void
    {
        include_once __DIR__ . '/../../views/components/header.php';
        // Routes
        switch ($request) {
            case '':
            case '/':
                require __DIR__ . '/../../views/home.php';
                break;
            case '/notes':
            case '/notes/':
                require __DIR__ . '/../../views/notes/all.php';
                break;
            case '/note':
            case '/note/':
                require __DIR__ . '/../../views/notes/show.php';
                break;
            case '/note/add':
            case '/note/add/':
                require __DIR__ . '/../../views/notes/add.php';
                break;
            case '/note/edit':
            case '/note/edit/':
                require __DIR__ . '/../../views/notes/edit.php';
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/../../views/404.php';
                break;
        }
        include_once __DIR__ . '/../../views/components/footer.php';
    }

    /**
     * Method handleGetRequest()
     * To handle GET requests and display the right view with the right data
     */
    static public function handleGetRequest()
    {

    }

    /**
     * Method handlePostRequest()
     * To handle POST requests and treat the data sent by the user
     */
    static public function handlePostRequest()
    {

    }
}
