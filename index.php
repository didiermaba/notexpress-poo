<?php 

require_once __DIR__ . '/autoloading.php';
require_once __DIR__ . '/vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

include_once __DIR__ . '/views/components/header.php';

// Routes
switch ($request) {
    case '' :
        require __DIR__ . '/views/home.php';
        break;
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
    case '/notes' :
        require __DIR__ . '/views/notes/all.php';
        $pageTitle = 'Notes';
        break;
    case '/note' :
        require __DIR__ . '/views/notes/show.php';
        break;
    case '/note/add' :
        require __DIR__ . '/views/notes/add.php';
        break;
    case '/note/edit' :
        require __DIR__ . '/views/notes/edit.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

include_once __DIR__ . '/views/components/footer.php';



