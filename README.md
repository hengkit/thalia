# Thalia

Prototype Rest Wrapper for the [Terminus CLI](https://github.com/pantheon-systems/terminus) using [Slim Framework 3](http://www.slimframework.com/).
This is not production level code, merely a POC for using [Terminus as a library](https://github.com/pantheon-systems/terminus/blob/master/docs/Terminus.md)

Only possible with extensive help from [TeslaDethray](https://github.com/tesladethray). She is not responsible for my PHP.

#Installation
## Local

1. Clone the repo locally
2. Run `composer install`
3. start the local PHP server with `php -S localhost:8080`

## Heroku
1. [![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)
2. Add your terminus machine token as a configuration variable named `TERMINUS_TOKEN`

#Operations

|Verb|Resource|Payload|Terminus Command|Notes|
|--------|----|-------|----------------|-----|
|GET|/terminus/auth/whoami||`terminus auth whoami`|Returns logged in user information|
|POST|/terminus/auth/login|{'email':'me@example.com'}|`terminus auth login`|Set `TERMINUS_TOKEN` environment variable with your token|
|POST|/terminus/auth/logout||`terminus auth logout`||
|GET|/terminus/sites/{siteName}||`terminus sites list --name`|This is potentially very slow. Might need a callback|

## Operations TODO
|Verb|Resource|Payload|Terminus Command|Notes|
|--------|----|-------|----------------|-----|
|GET|/terminus/cli/version||`terminus cli version`|Returns terminus version|
|GET|/terminus/site/{siteName}/?{optional:fieldName}||`terminus site info`||
|GET|/terminus/site/{siteName}/env||`terminus site environments`||
|DELETE|/terminus/site/{siteName}||`terminus site delete`||
|GET|/terminus/site/{siteName}/env/{envName}?{optional:fieldName}||`terminus site environment-info`||
|POST|/terminus/site/{siteName}/env/{envName}||`terminus site create-env`||
|DELETE|/terminus/site/{siteName}/env/{envName}||`terminus site delete-env`||
|GET|/terminus/sites||`terminus sites list`||
|POST|/terminus/sites/{siteName}||`terminus sites create`||
|POST|/drush/{siteName}/{env}|{'command':'version'}|`terminus drush`||
|POST|/wp/{siteName}/{env}|{'command':'cli info'}|`terminus wp`||

# Real To-Dos
* Add drush operations
* Add WP-CLI operations

#Why Thalia?

The Muse of comedic poetry. It's a ReST wrapper for a CLI for a ReST API. Ouroboros anyone?
