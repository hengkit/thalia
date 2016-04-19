# Thalia

Rest Wrapper for terminus

#Operations

## Utility Operations

**GET** /terminus/cli/version

Returns terminus version, wraps `terminus cli version`

**GET** /terminus/auth

Returns logged in user information or 404 if not logged in, wraps `terminus auth whoami`

**POST** /terminus/auth/login

**POST** /terminus/auth/logout

## Site Operations
**GET** /terminus/site/{siteName}

**GET** /terminus/site/{siteName}/{fieldName}

{fieldName} is optional. Returns site information or 404 if site not found, wraps `terminus site info`

**GET** /terminus/site/{siteName}/env


**DELETE** /terminus/site/{siteName}

Deletes site. Wraps `terminus site delete`

**GET** /terminus/site/{siteName}/env/{envName}

**GET** /terminus/site/{siteName}/env/{envName}/{fieldName}

{fieldName} is optional. Returns  environment information or 404 if site not found, wraps `terminus site environment-info`

**POST** /terminus/site/{siteName}/env/{envName}

**DELETE** /terminus/site/{siteName}/env/{envName}

**GET** /terminus/sites

**POST** /terminus/sites/{siteName}

Returns 201 if site is created, 409 if site already exists, wraps `terminus sites create`
