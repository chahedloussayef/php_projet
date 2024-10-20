<?php
require '../vendor/autoload.php';

use Router\Router;
use Controller\TaskController;

$router = new Router();
$router->add('/', 'Controller\TaskController', 'list');
$router->add('/tasks', 'Controller\TaskController', 'list');
$router->add('/tasks/add', 'Controller\TaskController', 'add');
$router->add('/tasks/complete', 'Controller\TaskController', 'complete');
$router->add('/tasks/delete', 'Controller\TaskController', 'delete');
$router->handleRequest();