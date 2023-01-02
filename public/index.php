<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'usr' => $_ENV['DB_USR'],
        'psd' => $_ENV['DB_PSD'],

    ]
];
$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/ship', [SiteController::class, 'ship']);
$app->router->get('/cruise', [SiteController::class, 'cruise']);
$app->router->get('/port', [SiteController::class, 'port']);
$app->router->get('/room', [SiteController::class, 'room']);
$app->router->get('/getCruise', [SiteController::class, 'getCruise']);
$app->router->get('/reservation', [SiteController::class, 'reservation']);


$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->post('/contact', [SiteController::class, 'handlingContact']);
$app->router->post('/createCruise', [AuthController::class, 'createCruise']);
$app->router->post('/createPort', [AuthController::class, 'createPort']);
$app->router->post('/createShip', [AuthController::class, 'createShip']);
$app->router->post('/editPort', [AuthController::class, 'editPort']);

$app->router->post('/cruiseDelete', [AuthController::class, 'deleteCruise']);
$app->router->post('/portDelete', [AuthController::class, 'deletePort']);
$app->router->post('/roomReserve', [AuthController::class, 'reserveRoom']);
$app->router->post('/cancelReserve', [AuthController::class, 'reserveCancel']);


$app->run();