<?php 

namespace controllers;

use models\AbstractModel;
use utilities\Database;

abstract class AbstractController
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getPdo();
    }

}