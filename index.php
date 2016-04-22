<?php

require(__DIR__ . '/vendor/autoload.php');
define(TERMINUS_ROOT, __DIR__ . '/vendor/pantheon-systems/terminus/');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Terminus\Models\Auth;
use \Terminus\Session;

$app = new \Slim\App;

$app->post('/terminus/auth/login', function ($request, $response, $args) {
    $authPayload = $request->getParsedBody();
    $auth = new Auth();
    //TODO: FIX THIS TO USE HEROKU ENVIRONMENT VARIABLE
    $auth->logInViaMachineToken($authPayload['authentication']['token'],$authPayload['authentication']['email']);
    return $response->write($auth);
});

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
    $this->output()->outputRecord($data);
  } else {
    $this->failure('You are not logged in.');
  }

    return $response->write($this);
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
