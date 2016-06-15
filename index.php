<?php

require(__DIR__ . '/vendor/autoload.php');
define(TERMINUS_ROOT, __DIR__ . '/vendor/pantheon-systems/terminus/');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Terminus\Models\Auth;
use \Terminus\Commands\AuthCommand;
use \Terminus\Commands\TerminusCommand;
use Terminus\Runner;
use \Terminus\Commands\SiteCommand;
use \Terminus\Session;

//$app = new \Slim\App;
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
//login
$app->post('/terminus/auth/login', function ($request, $response, $args) {
  try {
    $authPayload = $request->getParsedBody();
    $terminusArgs['email']=$authPayload['email'];
    $terminusArgs['token'] = getenv('TERMINUS_TOKEN');
    $auth = new Auth();
    $auth->logInViaMachineToken($terminusArgs);
    $response->withStatus(200);
    return $response;
  } catch (Exception $e) {
    $response->withStatus(403);
    return $response;
  }

});
// logout
$app->post('/terminus/auth/logout', function ($request, $response, $args) {
    $auth = new Auth();
    $auth->logOut();
    return $response->withStatus(200);
});
//whoami
$app->get('/terminus/auth/whoami', function ($request, $response, $args) {
  $authCommand = new AuthCommand(['runner' => new Runner()]);
  $me = $authCommand->whoami();
  $response->withJson($me);
  return $response;
});
#/terminus/site/{siteName}/env/{envName}
//terminus site info
$app->get('/terminus/site/{siteName}/', function ($request, $response, $args) {
  $siteName=['siteName'=>$args['siteName']];
  $site=new SiteCommand();
  $siteinfo = $site->info($siteName);
  $response->withJson($siteinfo);

  return $response;
});

$app->post('/terminus/site/{siteName}/env/{envName}', function ($request, $response, $args) {

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
