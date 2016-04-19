# Thalia

Rest Wrapper for terminus

#Operations

**GET** /terminus/cli/version

**GET** /terminus/site/{siteName}/env/{envName}
**GET** /terminus/site/{siteName}/env/{envName}/{fieldName}
**POST** /terminus/site/{siteName}/env/{envName}
**DELETE** /terminus/site/{siteName}/env/{envName}

**GET** /terminus/site/{siteName}
**GET** /terminus/site/{siteName}/{fieldName}

**POST** /terminus/site/{siteName}
**DELETE** /terminus/site/{siteName}

**GET** /terminus/sites

**GET** /terminus/auth/
**POST** /terminus/auth/login
**POST** /terminus/auth/logout
