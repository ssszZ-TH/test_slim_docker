<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\UserController;
use App\Controllers\ProductController;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Routes สำหรับ User
$app->get('/user', [UserController::class, 'list']);
$app->get('/user/{id}', [UserController::class, 'get']);
$app->post('/user', [UserController::class, 'create']);
$app->put('/user/{id}', [UserController::class, 'update']);
$app->delete('/user/{id}', [UserController::class, 'delete']);

// // Routes สำหรับ Product
// $app->get('/products', [ProductController::class, 'list']);
// $app->get('/products/{id}', [ProductController::class, 'get']);
// $app->post('/products', [ProductController::class, 'create']);
// $app->put('/products/{id}', [ProductController::class, 'update']);
// $app->delete('/products/{id}', [ProductController::class, 'delete']);

// เพิ่ม routes อีก 8 ตัวตามลักษณะนี้

$app->run();