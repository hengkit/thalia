<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
use \Terminus\Commands\TerminusCommand;

$app = new \Slim\App;

// Define app routes
$app->get('/terminus/version/', function ($request, $response, $args) {
    return $response->write("terminus cli version stub");
});
$app->post('/terminus/site/env', function ($request, $response, $args) {
    return $response->write("create multidev stub " );
});
$app->delete('/terminus/site/env', function ($request, $response, $args) {
    return $response->write("delete multidev stub " );
});
// Run app
$app->run();
