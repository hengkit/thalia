<?php

require(__DIR__ . '/vendor/autoload.php');
define(TERMINUS_ROOT, __DIR__ . '/vendor/pantheon-systems/terminus/');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Terminus\Models\Auth;
use \Terminus\Commands\AuthCommand;
use \Terminus\Commands\TerminusCommand;
use Terminus\Runner;
use \Terminus\Commands\SitesCommand;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => false,
        'defaultRunner'=>[
          'runner' => new Runner(array('format'=> 'json','output'=>'php://output'))
        ]
    ]
]);

//terminus auth login
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
//terminus auth  logout
$app->post('/terminus/auth/logout', function ($request, $response, $args) {
    $authCommand = new AuthCommand($this->get('settings')['defaultRunner']);
    $authCommand->logout();
    return $response->withStatus(200);
});
//terminus auth whoami
$app->get('/terminus/auth/whoami', function ($request, $response, $args) {
  try {
    $authCommand = new AuthCommand($this->get('settings')['defaultRunner']);
    $me = $authCommand->whoami();
    $response = json_decode($me);
    //$response->withJson($me);
    return $response;
} catch (Exception $e){
    return $response->withStatus(410);
}
});
//terminus sites show --name
//Incomplete. need to handle cases where user in not logged in or site is not found
$app->get('/terminus/sites/{siteName}', function ($request, $response, $args) {
  $sitesCommand = new SitesCommand($this->get('settings')['defaultRunner']);
  $meh=null;
  $info = $sitesCommand->index($meh,['name'=>$args[siteName]]);
  $response= json_decode($info);
  echo "$info";
  return $response;
});


//terminus site info
//
$app->get('/terminus/site/{siteName}', function ($request, $response, $args) {

  return $response;
});
//terminus site info --env
$app->post('/terminus/site/{siteName}/env/{envName}', function ($request, $response, $args) {

  return $response;
});

//sanity check
$app->get('/ping', function ($request, $response, $args) {
    return $response->write("pong");
});
//testing trash goes here until I figure out slimframework
$app->get('/test/{firstname}/filler/{lastname}', function ($request, $response, $args) {
    return $response->write($args['firstname']);
});


// Run app
$app->run();
