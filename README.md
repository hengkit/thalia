# Thalia

Prototype Rest Wrapper for the [Terminus CLI](https://github.com/pantheon-systems/terminus)
This is not production level code, merely a POC for using [Terminus as a library](https://github.com/pantheon-systems/terminus/blob/master/docs/Terminus.md)

Only possible with extensive help from [TeslaDethray](https://github.com/tesladethray). She is not responsible for my PHP.

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

# Real ToDos
* heroku deploy button
* installation instructions

#Why Thalia?

The Muse of comedic poetry. It's a ReST wrapper for a CLI for a ReST API. Ouroboros anyone?
