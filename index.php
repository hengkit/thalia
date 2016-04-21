<?php

require(__DIR__ . '/vendor/autoload.php');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Terminus\Models\Auth;



/*function logIn(array $options) {
  if (!(is_null($options['token']) || is_null($options['email']))) {
    $auth = new Auth();
    $auth ->logInViaMachineToken($options['token'],$options['email']);
  }
}*/

$app = new \Slim\App;

$app->post('/terminus/auth/login', function ($request, $response, $args) {
    $authPayload = $request->getParsedBody();
    $auth = new Auth();
    $auth ->logInViaMachineToken($authPayload['authentication']['token'],$authPayload['authentication']['email']);
    return $response->write($auth);
});
$app->get('/ping', function ($request, $response, $args) {
    return $response->write("pong");
});
// Define app routes. Well that was naive

/*$app->get('/terminus/cli/version/', function ($request, $response, $args) {
    return $response->write("terminus cli version stub");
});
$app->post('/terminus/site/env', function ($request, $response, $args) {
    return $response->write("create multidev stub " );
});
$app->delete('/terminus/site/env', function ($request, $response, $args) {
    return $response->write("delete multidev stub " );
});*/

// Run app
$app->run();
