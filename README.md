# Thalia

Rest Wrapper for terminus

#Operations

## Utility Operations

|Verb|Resource|Payload|Terminus Command|Notes|
|--------|----|-------|----------------|-----|
|GET|/terminus/cli/version||`terminus cli version`|Returns terminus version|
|GET|/terminus/auth||`terminus auth whoami`|Returns logged in user information|
|POST|/terminus/auth/login||`terminus auth login`||
|POST|/terminus/auth/logout||`terminus auth logout`||


## Site Operations
|Verb|Resource|Payload|Terminus Command|Notes|
|--------|----|-------|----------------|-----|
|GET|/terminus/site/{siteName}/?{optional:fieldName}||`terminus site info`||
|GET|/terminus/site/{siteName}/env||`terminus site environments`||
|DELETE|/terminus/site/{siteName}||`terminus site delete`||
|GET|/terminus/site/{siteName}/env/{envName}?{optional:fieldName}||`terminus site environment-info`||
|POST|/terminus/site/{siteName}/env/{envName}||`terminus site create-env`||
|DELETE|/terminus/site/{siteName}/env/{envName}||`terminus site delete-env`||

##Sites Operations (Don't judge me, it's pragmatic)

|Verb|Resource|Payload|Terminus Command|Notes|
|--------|----|-------|----------------|-----|
|GET|/terminus/sites||`terminus sites list`||
|POST|/terminus/sites/{siteName}||`terminus sites create`||
