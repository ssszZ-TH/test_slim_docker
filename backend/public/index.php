<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\UserController;
use App\Controllers\ProductController;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// ทำ body parser ใช้เอง เพื่อความสดวก
$app->add(function (Request $request, $handler) {
    $contentType = $request->getHeaderLine('Content-Type');
    if (stripos($contentType, 'application/json') !== false) {
        $rawBody = $request->getBody()->getContents();
        $parsedBody = json_decode($rawBody, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $request = $request->withParsedBody($parsedBody);
        }
    }
    return $handler->handle($request);
});

// test
$app->get('/test', function (Request $request, Response $response): Response {
    $test = ['message' => 'spa use slim framework'];
    $response->getBody()->write(json_encode($test));
    return $response->withHeader('Content-Type', 'application/json');
});

// Routes สำหรับ User
$app->get('/users', [UserController::class, 'list']);
$app->get('/users/{id}', [UserController::class, 'get']);
$app->post('/users', [UserController::class, 'create']);
$app->put('/users/{id}', [UserController::class, 'update']);
$app->delete('/users/{id}', [UserController::class, 'delete']);

// // Routes สำหรับ Product
// $app->get('/products', [ProductController::class, 'list']);
// $app->get('/products/{id}', [ProductController::class, 'get']);
// $app->post('/products', [ProductController::class, 'create']);
// $app->put('/products/{id}', [ProductController::class, 'update']);
// $app->delete('/products/{id}', [ProductController::class, 'delete']);

// เพิ่ม routes อีก 8 ตัวตามลักษณะนี้

$app->run();