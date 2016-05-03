<?php

require(__DIR__ . '/vendor/autoload.php');
define(TERMINUS_ROOT, __DIR__ . '/vendor/pantheon-systems/terminus/');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Terminus\Models\Auth;
use \Terminus\Session;

$app = new \Slim\App;

$app->post('/terminus/auth/login', function ($request, $response, $args) {
  try {
    $authPayload = $request->getParsedBody();
    $terminusArgs['email']=$authPayload['email'];
    $terminusArgs['token'] = getenv('TERMINUS_TOKE');
    $auth = new Auth();
    $auth->logInViaMachineToken($terminusArgs);
    $response->withStatus(200);
    return $response;
  } catch (Exception $e) {
    $response->withStatus(403);
    return $response;
  }

});
// There is no logout function, have to invalidate session
$app->post('/terminus/auth/logout', function ($request, $response, $args) {
    $auth = new Auth();
    $auth->logout();
    return $response->write($auth);
});
$app->get('/terminus/auth/whoami', function ($request, $response, $args) {
  if (Session::getValue('user_uuid')) {
    $user = Session::getUser();
    $user->fetch();
    $data = $user->serialize();
    $response->withJson($data);
  } else {
    $response->withStatus(403);
  }
  return $response;
});
$app->get('/ping', function ($request, $response, $args) {
    return $response->write("pong");
});
//testing trash goes here until I figure out slimframework
$app->get('/test/{firstname}/filler/{lastname}', function ($request, $response, $args) {
    return $response->write($args['firstname']);
});


// Run app
$app->run();
