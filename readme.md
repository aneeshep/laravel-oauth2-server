## Laravel4 Oauth2 Server

Laravel4 Oauth2 Server with [Sentry](https://cartalyst.com/manual/sentry) Support

## Installation

1. `git clone https://github.com/aneeshep/laravel-oauth2-server.git`
2. `cd laravel-oauth2-server`
3. `composer install`
4. `Setup the db details in app/config/database.php`
5. `php artisan migrate --package=cartalyst/sentry`
6. `php artisan migrate --package="lucadegasperi/oauth2-server-laravel"`
7. `php artisan migrate`
8. `php artisan db:seed`

## Usage

### Get access token

#### Request for token


```
    POST /oauth/access_token HTTP/1.1
    Host: oauthserver.local
    Cache-Control: no-cache
    Content-Type: application/x-www-form-urlencoded
    grant_type=password&client_id=saqnelrfjqtplzwr&
    client_secret=efwsrljppdkawrnef&username=admin&
    password=password&scope=webapp
```
#### Sample Output

```    
    {
        access_token: "EDNIIACytthbaLOojrTNobks4aRe9YgjSrqIS3SG"
        token_type: "bearer"
        expires: 1397233962
        expires_in: 604800
        refresh_token: "GJxMkIve9LOIA3oIyGlmI5xNvkYFYxQfuFd6cvW0"
    }
```
### Use the token

#### Request

```
    GET /secure-route HTTP/1.1
    Host: oauthserver.local
    Authorization: OFUqQFikjVr6e7EvsogU994qexGDk3HTwrVnv4mW
    Cache-Control: no-cache
       
```

### Secure the API end points

Filters are used to secure the API end points. `oauth` filrer is used to check the validity of access token and also the scope. 
`access` filter is used to check the user permission.

```
    Route::get('test', array('before' => array('oauth:webapp', 'access:user.delete,user.create'), function()
    {
        return 'Access token and Scope are valid and You have the permission to create and delete the user!';
    }));
```

